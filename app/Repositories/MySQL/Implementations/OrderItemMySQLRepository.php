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

    public function getPriceSumByOrderId(int $orderId):int
    {
        return $this->model->where('order_id', $orderId)->with('product', 'customization', 'option')->get()->sum('total_price');
    }
}
