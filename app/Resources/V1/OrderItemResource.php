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
            'product' => [
                'id' => $this->product->id,
                'title' => $this->product->title,
            ],
            'customization' => $this->customization ? [
                'id' => $this->customization->id,
                'title' => $this->customization->title,
            ] : [],
            'option_id' => $this->option ? [
                'id' => $this->option->id,
                'title' => $this->option->title,
            ] : [],
            'number' => $this->number,
        ];
    }
}
