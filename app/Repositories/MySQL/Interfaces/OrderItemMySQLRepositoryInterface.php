<?php

namespace App\Repositories\MySQL\Interfaces;

interface OrderItemMySQLRepositoryInterface
{
    public function getPriceSumByOrderId(int $orderId): int;
}
