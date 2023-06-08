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
            'order_id' => $this->id,
            'product_id' => $this->product_id,
            'customization_id' => $this->customization_id,
            'option_id' => $this->option_id,
            'number' => $this->number,
        ];
    }
}
