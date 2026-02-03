<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DraftOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'reseller_id',
        'warehouse_id',
        'status',
        'total_amount',
        'notes'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($draftOrder) {
            if (empty($draftOrder->order_code)) {
                $draftOrder->order_code = self::generateOrderCode();
            }
        });
    }

    private static function generateOrderCode()
    {
        $date = now()->format('Ymd');
        
        // Get last sequence from both DraftOrder and Transaction
        $lastDraftOrder = self::whereDate('created_at', today())
            ->orderBy('id', 'desc')
            ->first();
        
        $lastTransaction = \App\Models\Transaction::whereDate('created_at', today())
            ->orderBy('id', 'desc')
            ->first();
        
        // Extract sequences
        $draftSequence = $lastDraftOrder && $lastDraftOrder->order_code 
            ? intval(substr($lastDraftOrder->order_code, -4)) 
            : 0;
        
        $transactionSequence = $lastTransaction && $lastTransaction->transaction_code 
            ? intval(substr($lastTransaction->transaction_code, -4)) 
            : 0;
        
        // Use the highest sequence + 1
        $sequence = max($draftSequence, $transactionSequence) + 1;
        
        return 'TRX-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }

    public function reseller()
    {
        return $this->belongsTo(User::class, 'reseller_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function items()
    {
        return $this->hasMany(DraftOrderItem::class);
    }
}
