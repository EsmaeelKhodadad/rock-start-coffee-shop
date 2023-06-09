<?php

namespace App\Repositories\MySQL\Interfaces;

interface OrderItemMySQLRepositoryInterface
{
    /**
     * @param int $orderId
     * @return int
     */
    public function getPriceSumByOrderId(int $orderId): int;

    /**
     * @param int $orderId
     * @return void
     */
    public function deleteByOrderId(int $orderId):void;
}
