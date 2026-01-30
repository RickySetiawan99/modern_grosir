<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    protected $fillable = ['user_id', 'reseller_tier_id', 'credit_limit'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tier()
    {
        return $this->belongsTo(ResellerTier::class, 'reseller_tier_id');
    }
}
