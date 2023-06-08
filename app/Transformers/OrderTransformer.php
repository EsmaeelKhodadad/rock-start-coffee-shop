<?php

namespace App\Transformers;

use App\DTO\OrderStoreDTO;
use App\Requests\OrderStoreRequest;

class OrderTransformer
{
    /**
     * @param int $userId
     * @return OrderStoreDTO
     */
    public static function toOrderStoreDTO(int $userId): OrderStoreDTO
    {
        return (new OrderStoreDTO())->setUserId($userId);
    }

    public function toOrderItemSoreDTO(OrderStoreDTO $orderStoreDTO, OrderStoreRequest $orderStoreRequest)
    {

    }
}
