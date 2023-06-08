<?php

namespace App\Resources\V1;

use App\DTO\OrderItemDTO;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin OrderItemDTO
 */
class OrderItemStoreResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'order_id' => $this->getOrderId(),
            'product_id' => $this->getProductId(),
            'customization_id' => $this->getCustomizationId(),
            'option_id' => $this->getOptionId(),
            'number' => $this->getNumber(),
        ];
    }
}
