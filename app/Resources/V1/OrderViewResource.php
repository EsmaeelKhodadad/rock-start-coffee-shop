<?php

namespace App\Resources\V1;

use App\Models\Order;
use App\Services\Interfaces\OrderItemServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 */
class OrderViewResource extends JsonResource
{
    public function toArray($request): array
    {
        $orderItemService = resolve(OrderItemServiceInterface::class);
        return [
            'order_id' => $this->id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'order_items' => OrderItemResource::collection($this->orderItems),
            'total_price' => $orderItemService->getTotalPriceByOrderId($this->id),
        ];
    }
}
