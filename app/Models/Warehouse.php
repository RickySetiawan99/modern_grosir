<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'type', 'location'];

    public function stockLevels()
    {
        return $this->hasMany(StockLevel::class);
    }
}
