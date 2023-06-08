<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\OrderItem;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\OrderItemMySQLRepositoryInterface;

class OrderItemMySQLRepository extends BaseRepository implements OrderItemMySQLRepositoryInterface
{
    /**
     * @param OrderItem $orderItem
     */
    public function __construct(OrderItem $orderItem)
    {
        parent::__construct($orderItem);
    }
}
