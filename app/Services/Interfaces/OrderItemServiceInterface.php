<?php

namespace App\Services\Interfaces;

use App\DTO\OrderItemDTO;
use App\DTO\OrderItemViewDTO;

interface OrderItemServiceInterface
{
    /**
     * @param OrderItemDTO $orderItemDTO
     * @return OrderItemViewDTO
     */
    public function create(OrderItemDTO $orderItemDTO): OrderItemViewDTO;

    /**
     * @param int $orderId
     * @return int
     */
    public function getTotalPriceByOrderId(int $orderId): int;

    /**
     * @param int $orderId
     * @return void
     */
    public function deleteByOrderId(int $orderId):void;
}
