<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'transaction_code' => $this->transaction_code,
            'amount' => (float) $this->total_amount,
            'status' => $this->status,
            'date' => $this->created_at->format('Y-m-d H:i:s'),
            'type' => 'Sale', // Since these are from sales
        ];
    }
}
