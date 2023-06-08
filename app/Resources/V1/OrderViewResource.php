<?php

namespace App\Resources\V1;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 */
class OrderViewResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'order_items' => OrderItemResource::collection($this->orderItems),
        ];
    }
}
