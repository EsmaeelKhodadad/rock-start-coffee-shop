<?php

namespace App\Resources\V1;

use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin OrderItem
 */
class OrderItemResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'human_readable_order' => $this->human_readable_order,
            'number' => $this->number,
            'price' => $this->total_price,
        ];
    }
}
