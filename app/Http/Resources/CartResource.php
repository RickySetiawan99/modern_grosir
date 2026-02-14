<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'order_code' => $this->order_code,
            'status' => $this->status,
            'total_amount' => (float) $this->total_amount,
            'items' => CartItemResource::collection($this->whenLoaded('items')),
            'item_count' => $this->items->count(),
            'notes' => $this->notes,
        ];
    }
}
