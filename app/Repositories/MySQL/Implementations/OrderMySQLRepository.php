<?php

namespace App\Repositories\MySQL\Implementations;

use App\Models\Order;
use App\Repositories\Base\BaseRepository;
use App\Repositories\MySQL\Interfaces\OrderMySQLRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class OrderMySQLRepository extends BaseRepository implements OrderMySQLRepositoryInterface
{
    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
}
