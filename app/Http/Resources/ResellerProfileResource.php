<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResellerProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'avatar_url' => $this->user->avatar ? url($this->user->avatar) : null,
            ],
            'tier' => [
                'id' => $this->tier->id,
                'name' => $this->tier->name,
                'discount_percentage' => (float) $this->tier->discount_percentage,
            ],
            'credit_limit' => (float) $this->credit_limit,
            'balance' => (float) $this->balance,
            'points' => $this->loyalty_points,
            'orders_count' => $this->orders()->count(),
            'member_since' => $this->created_at->format('M Y'),
            'business_name' => $this->store_name,
            'business_location' => $this->address,
            'phone' => $this->phone,
        ];
    }
}
