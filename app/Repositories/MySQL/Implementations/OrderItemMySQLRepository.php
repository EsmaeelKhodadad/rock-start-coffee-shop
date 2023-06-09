<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\OrderItem;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\OrderItemMySQLRepositoryInterface;

class OrderItemMySQLRepository extends BaseRepository implements OrderItemMySQLRepositoryInterface
{
    /**
     * @param OrderItem $orderItem
     * @param string|null $connection
     */
    public function __construct(OrderItem $orderItem, string $connection = null)
    {
        parent::__construct($orderItem, $connection ?? config('database.default'));
    }

    /**
     * @inheritDoc
     */
    public function getPriceSumByOrderId(int $orderId): int
    {
        return $this->model
            ->setConnection($this->connection)
            ->where('order_id', $orderId)
            ->with('product', 'customization', 'option')
            ->get()
            ->sum('total_price');
    }

    /**
     * @inheritDoc
     */
    public function deleteByOrderId(int $orderId): void
    {
        $this->model
            ->setConnection($this->connection)
            ->where('order_id', $orderId)
            ->delete();
    }
}
