<?php

namespace App\Services\Implementations;

use App\DTO\BaseDTO;
use App\Repositories\MySQL\Interfaces\OrderMySQLRepositoryInterface;
use App\Repositories\MySQL\Interfaces\ProductMySQLRepositoryInterface;
use App\Resources\V1\ProductResource;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderService implements OrderServiceInterface
{
    /**
     * @var OrderMySQLRepositoryInterface
     */
    private $orderMySQLRepository;

    /**
     * @param OrderMySQLRepositoryInterface $orderMySQLRepository
     */
    public function __construct(OrderMySQLRepositoryInterface $orderMySQLRepository)
    {
        $this->orderMySQLRepository = $orderMySQLRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(BaseDTO $baseDTO)
    {

    }
}
