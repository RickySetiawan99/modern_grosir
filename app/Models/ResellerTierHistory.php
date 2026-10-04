<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerTierHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'reseller_id',
        'old_tier_id',
        'new_tier_id',
        'monthly_spent',
        'evaluation_period',
        'reason',
    ];

    protected $casts = [
        'monthly_spent' => 'decimal:2',
    ];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }

    public function oldTier()
    {
        return $this->belongsTo(ResellerTier::class, 'old_tier_id');
    }

    public function newTier()
    {
        return $this->belongsTo(ResellerTier::class, 'new_tier_id');
    }
}
