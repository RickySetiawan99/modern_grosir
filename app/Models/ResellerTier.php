<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResellerTier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'discount_percentage'];
}
