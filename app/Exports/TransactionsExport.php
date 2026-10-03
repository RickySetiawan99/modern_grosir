<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $startDate;
    protected $endDate;
    protected $warehouseId;
    protected $resellerId;

    public function __construct($startDate = null, $endDate = null, $warehouseId = null, $resellerId = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->warehouseId = $warehouseId;
        $this->resellerId = $resellerId;
    }

    public function collection()
    {
        $query = Transaction::with(['customer', 'details.product']);

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('created_at', [$this->startDate . ' 00:00:00', $this->endDate . ' 23:59:59']);
        }
        if ($this->warehouseId) {
            $warehouseId = $this->warehouseId;
            $query->whereHas('details.batch', function ($q) use ($warehouseId) {
                $q->where('warehouse_id', $warehouseId);
            });
        }
        if ($this->resellerId) {
            $query->where('customer_id', $this->resellerId);
        }

        return $query->latest()->get();
    }

    public function headings(): array
    {
        return [
            'Date',
            'Transaction Code',
            'Customer',
            'Status',
            'Total Revenue',
            'Total Cost (COGS)',
            'Gross Profit'
        ];
    }

    public function map($transaction): array
    {
        $totalCost = 0;
        foreach ($transaction->details as $detail) {
            $totalCost += ($detail->product->purchase_price ?? 0) * $detail->quantity;
        }

        $profit = $transaction->total_amount - $totalCost;

        return [
            $transaction->created_at->format('d/m/Y H:i'),
            $transaction->transaction_code,
            $transaction->customer->name ?? 'Retail/Guest',
            ucfirst($transaction->status),
            $transaction->total_amount,
            $totalCost,
            $profit
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
