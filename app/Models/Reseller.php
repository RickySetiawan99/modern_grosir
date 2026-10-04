<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reseller_tier_id',
        'is_tier_locked',
        'credit_limit',
        'store_name',
        'address',
        'phone',
        'balance',
        'loyalty_points',
    ];

    protected $casts = [
        'is_tier_locked' => 'boolean',
        'credit_limit' => 'decimal:2',
        'balance' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tier()
    {
        return $this->belongsTo(ResellerTier::class, 'reseller_tier_id');
    }

    public function tierHistories()
    {
        return $this->hasMany(ResellerTierHistory::class);
    }

    public function orders()
    {
        return $this->hasMany(DraftOrder::class, 'reseller_id', 'user_id');
    }

    public function walletTransactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }
}
