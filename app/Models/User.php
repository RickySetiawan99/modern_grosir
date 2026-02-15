<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'social_id',
        'social_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reseller()
    {
        return $this->hasOne(Reseller::class);
    }

    /**
     * Get the reseller profile, or create one if it doesn't exist and the user is a reseller.
     */
    public function getResellerProfile()
    {
        $reseller = $this->reseller;

        if (!$reseller && $this->hasRole('reseller')) {
            $reseller = Reseller::create([
                'user_id' => $this->id,
                'reseller_tier_id' => 1, // Default to Bronze
                'store_name' => $this->name . "'s Store",
            ]);
        }

        return $reseller;
    }
}
