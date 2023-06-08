<?php

namespace App\Services\Interfaces;

use App\DTO\OrderItemDTO;
use App\DTO\OrderItemViewDTO;
use App\DTO\OrderStoreDTO;
use App\DTO\OrderViewDTO;
use App\Requests\OrderStoreRequest;

interface OrderItemServiceInterface
{
    /**
     * @param OrderItemDTO $orderItemDTO
     * @return OrderItemViewDTO
     */
    public function create(OrderItemDTO $orderItemDTO):OrderItemViewDTO;
}
