<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 
        'unit_id', 
        'name', 
        'sku', 
        'purchase_price', 
        'retail_price', 
        'safety_stock',
        'description',
        'image',
        'has_expiration',
        'default_shelf_life_days',
        'expiration_alert_days'
    ];

    protected $casts = [
        'has_expiration' => 'boolean',
        'default_shelf_life_days' => 'integer',
        'expiration_alert_days' => 'integer',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function stockLevels()
    {
        return $this->hasMany(StockLevel::class);
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function tierPrices()
    {
        return $this->hasMany(ProductTierPrice::class);
    }

    public function batches()
    {
        return $this->hasMany(InventoryBatch::class);
    }

    /**
     * Helper Methods for Expiration Management
     */
    public function hasExpiration()
    {
        return $this->has_expiration;
    }

    public function getDefaultExpirationDate($receivedDate = null)
    {
        if (!$this->has_expiration || !$this->default_shelf_life_days) {
            return null;
        }

        $baseDate = $receivedDate ? \Carbon\Carbon::parse($receivedDate) : now();
        return $baseDate->addDays($this->default_shelf_life_days)->format('Y-m-d');
    }
}
