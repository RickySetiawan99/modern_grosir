<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $fillable = ['user_id', 'reseller_tier_id', 'credit_limit', 'store_name', 'address', 'phone', 'balance', 'loyalty_points'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tier()
    {
        return $this->belongsTo(ResellerTier::class, 'reseller_tier_id');
    }

    public function orders()
    {
        return $this->hasMany(DraftOrder::class, 'reseller_id', 'user_id');
    }
}
