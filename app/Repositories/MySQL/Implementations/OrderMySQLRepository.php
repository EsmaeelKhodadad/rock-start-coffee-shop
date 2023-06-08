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
     */
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }

    /**
     * @inheritDoc
     */
    public function getAllByUserId(int $userId): LengthAwarePaginator
    {
        return $this->model->where('user_id', $userId)->with('user', 'orderItems', 'orderItems.product', 'orderItems.customization', 'orderItems.option')->paginate(10);
    }
}
