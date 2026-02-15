<?php

namespace App\Http\Resources;

use App\Helpers\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletTransactionResource extends JsonResource
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
            'amount' => (float) $this->amount,
            'formatted_amount' => GeneralHelper::formatCurrency($this->amount),
            'type' => $this->type, // deposit, payment, refund
            'status' => $this->status, // pending, completed, failed, cancelled
            'notes' => $this->notes,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'human_date' => $this->created_at->diffForHumans(),
        ];
    }
}
