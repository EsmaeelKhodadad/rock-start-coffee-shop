<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Order;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\OrderMySQLRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class OrderMySQLRepository extends BaseRepository implements OrderMySQLRepositoryInterface
{
    /**
     * @param Order $order
     * @param string|null $connection
     */
    public function __construct(Order $order, string $connection = null)
    {
        parent::__construct($order, $connection ?? config('database.default'));
    }

    /**
     * @inheritDoc
     */
    public function getAllByUserId(int $userId): LengthAwarePaginator
    {
        return $this->model
            ->setConnection($this->connection)
            ->where('user_id', $userId)
            ->with('user', 'orderItems', 'orderItems.product')
            ->paginate(10);
    }

    /**
     * @inheritDoc
     */
    public function getByOrderIdAndUserId(int $orderId, int $userId)
    {
        return $this->model
            ->setConnection($this->connection)
            ->where('id', $orderId)
            ->where('user_id', $userId)
            ->first();
    }

    /**
     * @param int $orderId
     * @return void
     */
    public function deleteById(int $orderId): void
    {
        $this->model
            ->setConnection($this->connection)
            ->where('id', $orderId)
            ->delete();
    }
}
