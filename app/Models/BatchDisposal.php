<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchDisposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'quantity_disposed',
        'disposal_reason',
        'disposal_date',
        'disposed_by',
        'notes',
    ];

    protected $casts = [
        'disposal_date' => 'date',
        'quantity_disposed' => 'integer',
    ];

    /**
     * Relationships
     */
    public function batch()
    {
        return $this->belongsTo(InventoryBatch::class, 'batch_id');
    }

    public function disposedBy()
    {
        return $this->belongsTo(User::class, 'disposed_by');
    }

    /**
     * Scopes
     */
    public function scopeByReason($query, $reason)
    {
        return $query->where('disposal_reason', $reason);
    }

    public function scopeExpiredItems($query)
    {
        return $query->where('disposal_reason', 'expired');
    }

    /**
     * Helper Methods
     */
    public function getDisposalValueAttribute()
    {
        if (!$this->batch || !$this->batch->purchase_price) {
            return 0;
        }

        return $this->quantity_disposed * $this->batch->purchase_price;
    }
}
