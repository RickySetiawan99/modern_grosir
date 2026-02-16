<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpirationAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'alert_level',
        'days_until_expiry',
        'notified_at',
        'acknowledged_by',
        'acknowledged_at',
    ];

    protected $casts = [
        'notified_at' => 'datetime',
        'acknowledged_at' => 'datetime',
        'days_until_expiry' => 'integer',
    ];

    /**
     * Relationships
     */
    public function batch()
    {
        return $this->belongsTo(InventoryBatch::class, 'batch_id');
    }

    public function acknowledgedBy()
    {
        return $this->belongsTo(User::class, 'acknowledged_by');
    }

    /**
     * Accessors
     */
    public function getIsAcknowledgedAttribute()
    {
        return !is_null($this->acknowledged_at);
    }

    /**
     * Scopes
     */
    public function scopeUnacknowledged($query)
    {
        return $query->whereNull('acknowledged_at');
    }

    public function scopeCritical($query)
    {
        return $query->where('alert_level', 'critical');
    }

    public function scopeWarning($query)
    {
        return $query->where('alert_level', 'warning');
    }

    public function scopeInfo($query)
    {
        return $query->where('alert_level', 'info');
    }

    /**
     * Helper Methods
     */
    public function acknowledge($userId)
    {
        $this->update([
            'acknowledged_by' => $userId,
            'acknowledged_at' => now(),
        ]);
    }
}
