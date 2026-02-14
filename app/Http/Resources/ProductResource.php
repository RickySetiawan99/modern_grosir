<?php

namespace App\Http\Resources;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // 'calculated_price' and 'discount_percentage' are injected by ResellerService
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'description' => $this->description,
            'image_url' => $this->image ? url($this->image) : null,
            'category' => $this->whenLoaded('category', function() {
                return $this->category->name;
            }),
            'unit' => $this->whenLoaded('unit', function() {
                return $this->unit->name;
            }),
            'base_price' => (float) $this->retail_price,
            'your_price' => (float) $this->calculated_price,
            'discount_percentage' => (float) $this->discount_percentage,
            'formatted_base_price' => GeneralHelper::formatCurrency($this->retail_price),
            'formatted_your_price' => GeneralHelper::formatCurrency($this->calculated_price),
            'stock_total' => $this->stockLevels->sum('quantity'),
            // 'stock_breakdown' can be added if needed, but for list view total is usually enough
        ];
    }
}
