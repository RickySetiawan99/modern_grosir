<?php

namespace App\Services;

use App\Models\InventoryBatch;
use App\Models\BatchDisposal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BatchService
{
    /**
     * Create a new batch on stock receipt
     *
     * @param array $data
     * @return InventoryBatch
     */
    public function createBatch(array $data)
    {
        // Auto-generate batch number if not provided
        if (empty($data['batch_number'])) {
            $expirationService = new ExpirationService();
            $data['batch_number'] = $expirationService->generateBatchNumber($data['warehouse_id']);
        }

        // Auto-calculate expiration date if product has default shelf life
        if (empty($data['expiration_date']) && !empty($data['product_id'])) {
            $product = \App\Models\Product::find($data['product_id']);
            if ($product && $product->has_expiration && $product->default_shelf_life_days) {
                $data['expiration_date'] = $product->getDefaultExpirationDate($data['received_date'] ?? now());
            }
        }

        return InventoryBatch::create($data);
    }

    /**
     * Update batch information
     *
     * @param int $batchId
     * @param array $data
     * @return InventoryBatch
     */
    public function updateBatch($batchId, array $data)
    {
        $batch = InventoryBatch::findOrFail($batchId);

        // Prevent changing quantity directly (use disposal or stock adjustments)
        unset($data['quantity']);

        $batch->update($data);
        return $batch->fresh();
    }

    /**
     * Dispose batch (write-off)
     *
     * @param int $batchId
     * @param int $quantity
     * @param string $reason expired|damaged|quality_issue|other
     * @param string|null $notes
     * @return BatchDisposal
     */
    public function disposeBatch($batchId, $quantity, $reason = 'expired', $notes = null)
    {
        return DB::transaction(function() use ($batchId, $quantity, $reason, $notes) {
            $batch = InventoryBatch::findOrFail($batchId);

            // Validate quantity
            if ($quantity > $batch->quantity) {
                throw new \Exception("Cannot dispose more than available quantity ({$batch->quantity} units).");
            }

            // Create disposal record
            $disposal = BatchDisposal::create([
                'batch_id' => $batchId,
                'quantity_disposed' => $quantity,
                'disposal_reason' => $reason,
                'disposal_date' => now()->toDateString(),
                'disposed_by' => Auth::id(),
                'notes' => $notes,
            ]);

            // Deduct quantity from batch
            $batch->decrement('quantity', $quantity);

            // Mark batch as disposed if fully consumed
            if ($batch->quantity <= 0) {
                $batch->update(['status' => 'disposed']);
            }

            return $disposal;
        });
    }

    /**
     * Transfer batch to another warehouse
     *
     * @param int $batchId
     * @param int $toWarehouseId
     * @param int|null $quantity If null, transfer entire batch
     * @return InventoryBatch New batch in target warehouse
     */
    public function transferBatch($batchId, $toWarehouseId, $quantity = null)
    {
        return DB::transaction(function() use ($batchId, $toWarehouseId, $quantity) {
            $sourceBatch = InventoryBatch::findOrFail($batchId);

            $transferQty = $quantity ?? $sourceBatch->quantity;

            if ($transferQty > $sourceBatch->quantity) {
                throw new \Exception("Cannot transfer more than available quantity ({$sourceBatch->quantity} units).");
            }

            // Create new batch in target warehouse
            $newBatch = $this->createBatch([
                'product_id' => $sourceBatch->product_id,
                'warehouse_id' => $toWarehouseId,
                'batch_number' => $sourceBatch->batch_number . '-T', // Mark as transferred
                'quantity' => $transferQty,
                'received_date' => now()->toDateString(),
                'expiration_date' => $sourceBatch->expiration_date,
                'supplier_id' => $sourceBatch->supplier_id,
                'purchase_price' => $sourceBatch->purchase_price,
                'notes' => "Transferred from warehouse {$sourceBatch->warehouse_id}. Original batch: {$sourceBatch->batch_number}",
            ]);

            // Deduct from source batch
            $sourceBatch->decrement('quantity', $transferQty);

            if ($sourceBatch->quantity <= 0) {
                $sourceBatch->update(['status' => 'disposed']);
            }

            return $newBatch;
        });
    }

    /**
     * Get batch history (receipt → sales → disposal)
     *
     * @param int $batchId
     * @return array
     */
    public function getBatchHistory($batchId)
    {
        $batch = InventoryBatch::with([
            'product',
            'warehouse',
            'supplier',
            'transactionDetails.transaction',
            'disposals.disposedBy',
        ])->findOrFail($batchId);

        return [
            'batch' => $batch,
            'receipt' => [
                'date' => $batch->received_date,
                'quantity' => $batch->quantity + 
                    $batch->transactionDetails->sum('quantity') + 
                    $batch->disposals->sum('quantity_disposed'),
                'supplier' => $batch->supplier?->name,
            ],
            'sales' => $batch->transactionDetails->map(function($detail) {
                return [
                    'date' => $detail->transaction->created_at,
                    'transaction_code' => $detail->transaction->transaction_code,
                    'quantity' => $detail->quantity,
                    'customer' => $detail->transaction->customer->name ?? 'POS Sale',
                ];
            }),
            'disposals' => $batch->disposals->map(function($disposal) {
                return [
                    'date' => $disposal->disposal_date,
                    'quantity' => $disposal->quantity_disposed,
                    'reason' => $disposal->disposal_reason,
                    'disposed_by' => $disposal->disposedBy->name,
                ];
            }),
            'current_stock' => $batch->quantity,
            'status' => $batch->status,
        ];
    }

    /**
     * Auto-dispose expired batches
     *
     * @return int Number of batches disposed
     */
    public function autoDisposeExpiredBatches()
    {
        $expiredBatches = InventoryBatch::expired()
            ->where('quantity', '>', 0)
            ->get();

        $count = 0;

        foreach ($expiredBatches as $batch) {
            try {
                $this->disposeBatch(
                    $batch->id,
                    $batch->quantity,
                    'expired',
                    'Auto-disposed by system (expired)'
                );
                $count++;
            } catch (\Exception $e) {
                \Log::error("Failed to auto-dispose batch {$batch->id}: " . $e->getMessage());
            }
        }

        return $count;
    }
}
