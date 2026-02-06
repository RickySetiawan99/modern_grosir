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
        'image'
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
}
