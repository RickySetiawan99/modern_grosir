<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reseller_id',
        'amount',
        'type',
        'status',
        'proof_image',
        'notes',
    ];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class);
    }
}
