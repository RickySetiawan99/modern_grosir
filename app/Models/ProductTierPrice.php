<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTierPrice extends Model
{
    protected $fillable = ['product_id', 'reseller_tier_id', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function tier()
    {
        return $this->belongsTo(ResellerTier::class, 'reseller_tier_id');
    }
}
