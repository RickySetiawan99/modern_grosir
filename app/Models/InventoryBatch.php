<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class InventoryBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'warehouse_id',
        'batch_number',
        'quantity',
        'received_date',
        'expiration_date',
        'supplier_id',
        'purchase_price',
        'notes',
        'status',
    ];

    protected $casts = [
        'received_date' => 'date',
        'expiration_date' => 'date',
        'purchase_price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    /**
     * Relationships
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function alerts()
    {
        return $this->hasMany(ExpirationAlert::class, 'batch_id');
    }

    public function disposals()
    {
        return $this->hasMany(BatchDisposal::class, 'batch_id');
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class, 'batch_id');
    }

    /**
     * Accessors & Custom Attributes
     */
    public function getDaysUntilExpiryAttribute()
    {
        if (!$this->expiration_date) {
            return null;
        }

        return Carbon::parse($this->expiration_date)->diffInDays(now(), false);
    }

    public function getIsExpiredAttribute()
    {
        if (!$this->expiration_date) {
            return false;
        }

        return Carbon::parse($this->expiration_date)->isPast();
    }

    public function getAlertLevelAttribute()
    {
        $days = $this->days_until_expiry;

        if ($days === null || $days < 0) {
            return null;
        }

        if ($days <= 7) {
            return 'critical';
        } elseif ($days <= 14) {
            return 'warning';
        } elseif ($days <= 30) {
            return 'info';
        }

        return null;
    }

    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expiration_date')
                    ->orWhere('expiration_date', '>=', now());
            });
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'expired')
            ->orWhere(function ($q) {
                $q->where('status', 'active')
                    ->whereNotNull('expiration_date')
                    ->where('expiration_date', '<', now());
            });
    }

    public function scopeExpiringWithin($query, $days)
    {
        return $query->where('status', 'active')
            ->whereNotNull('expiration_date')
            ->whereRaw('DATEDIFF(expiration_date, CURDATE()) <= ?', [$days])
            ->whereRaw('DATEDIFF(expiration_date, CURDATE()) >= 0');
    }

    public function scopeFefoOrder($query)
    {
        return $query->where('status', 'active')
            ->where('quantity', '>', 0)
            ->orderByRaw('CASE WHEN expiration_date IS NULL THEN 1 ELSE 0 END')
            ->orderBy('expiration_date', 'asc')
            ->orderBy('received_date', 'asc');
    }

    /**
     * Helper Methods
     */
    public function getTotalValueAttribute()
    {
        return $this->quantity * $this->purchase_price;
    }

    public function canSell($requestedQty)
    {
        return $this->status === 'active' && 
               $this->quantity >= $requestedQty && 
               !$this->is_expired;
    }
}
