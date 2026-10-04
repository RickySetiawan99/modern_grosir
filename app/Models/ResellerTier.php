<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerTier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount_percentage',
        'min_monthly_spend',
    ];

    protected $casts = [
        'discount_percentage' => 'decimal:2',
        'min_monthly_spend' => 'decimal:2',
    ];

    public function resellers()
    {
        return $this->hasMany(Reseller::class);
    }
}
