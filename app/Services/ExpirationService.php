<?php

namespace App\Services;

use App\Models\InventoryBatch;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ExpirationService
{
    /**
     * Get available batches for a product using FEFO (First Expired, First Out)
     *
     * @param int $productId
     * @param int $warehouseId
     * @param int|null $quantity Optional: filter only batches with enough stock
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAvailableBatches($productId, $warehouseId, $quantity = null)
    {
        $query = InventoryBatch::where('product_id', $productId)
            ->where('warehouse_id', $warehouseId)
            ->where('quantity', '>', 0)
            ->where('status', 'active')
            ->where(function($q) {
                $q->whereNull('expiration_date')
                  ->orWhere('expiration_date', '>=', now());
            })
            ->fefoOrder(); // Use the scope from InventoryBatch model

        if ($quantity) {
            $query->where('quantity', '>=', $quantity);
        }

        return $query->get();
    }

    /**
     * Allocate requested quantity across multiple batches using FEFO
     *
     * @param \Illuminate\Database\Eloquent\Collection $batches
     * @param int $requestedQty
     * @return array Array of allocations: [batch_id, batch_number, quantity, expiration_date]
     */
    public function allocateQuantity($batches, $requestedQty)
    {
        $allocation = [];
        $remaining = $requestedQty;

        foreach ($batches as $batch) {
            if ($remaining <= 0) {
                break;
            }

            $allocatedQty = min($batch->quantity, $remaining);
            
            $allocation[] = [
                'batch_id' => $batch->id,
                'batch_number' => $batch->batch_number,
                'quantity' => $allocatedQty,
                'expiration_date' => $batch->expiration_date,
                'days_until_expiry' => $batch->days_until_expiry,
                'alert_level' => $batch->alert_level,
            ];

            $remaining -= $allocatedQty;
        }

        // Check if we have enough stock
        if ($remaining > 0) {
            throw new \Exception("Insufficient stock. Short by {$remaining} units.");
        }

        return $allocation;
    }

    /**
     * Check if a batch has enough available quantity
     *
     * @param int $batchId
     * @param int $quantity
     * @return bool
     */
    public function checkBatchAvailability($batchId, $quantity)
    {
        $batch = InventoryBatch::find($batchId);

        if (!$batch) {
            return false;
        }

        return $batch->canSell($quantity);
    }

    /**
     * Deduct quantity from batches using FEFO allocation
     *
     * @param int $productId
     * @param int $warehouseId
     * @param int $quantity
     * @return array Allocation details
     */
    public function deductStock($productId, $warehouseId, $quantity)
    {
        return DB::transaction(function() use ($productId, $warehouseId, $quantity) {
            // Get available batches in FEFO order
            $batches = $this->getAvailableBatches($productId, $warehouseId);

            // Allocate quantity
            $allocation = $this->allocateQuantity($batches, $quantity);

            // Deduct from each batch
            foreach ($allocation as $alloc) {
                $batch = InventoryBatch::find($alloc['batch_id']);
                $batch->decrement('quantity', $alloc['quantity']);

                // Auto-dispose if quantity reaches 0
                if ($batch->quantity <= 0) {
                    $batch->update(['status' => 'disposed']);
                }
            }

            return $allocation;
        });
    }

    /**
     * Generate a unique batch number for a warehouse
     *
     * @param int $warehouseId
     * @param string|null $prefix
     * @return string
     */
    public function generateBatchNumber($warehouseId, $prefix = 'BATCH')
    {
        $date = now()->format('Ymd');
        
        // Count batches created today for this warehouse
        $count = InventoryBatch::where('warehouse_id', $warehouseId)
            ->whereDate('created_at', now())
            ->count();

        $sequence = str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        return "{$prefix}-{$warehouseId}-{$date}-{$sequence}";
    }

    /**
     * Get batches expiring within specified days
     *
     * @param int $days
     * @param int|null $warehouseId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getExpiringBatches($days = 30, $warehouseId = null)
    {
        $query = InventoryBatch::expiringWithin($days)
            ->with(['product', 'warehouse']);

        if ($warehouseId) {
            $query->where('warehouse_id', $warehouseId);
        }

        return $query->orderBy('expiration_date', 'asc')->get();
    }

    /**
     * Get total value at risk (expiring soon)
     *
     * @param int $days
     * @return float
     */
    public function getValueAtRisk($days = 30)
    {
        return InventoryBatch::expiringWithin($days)
            ->get()
            ->sum(function($batch) {
                return $batch->quantity * $batch->purchase_price;
            });
    }

    /**
     * Check if a product requires expiration tracking
     *
     * @param int $productId
     * @return bool
     */
    public function productHasExpiration($productId)
    {
        $product = Product::find($productId);
        return $product && $product->has_expiration;
    }
}
