<?php

namespace App\Services\Implementations;

use App\DTO\OrderItemDTO;
use App\DTO\OrderItemViewDTO;
use App\Repositories\MySQL\Interfaces\OrderItemMySQLRepositoryInterface;
use App\Services\Interfaces\OrderItemServiceInterface;
use App\Transformers\OrderTransformer;
use http\Exception\RuntimeException;

class OrderItemService implements OrderItemServiceInterface
{
    /**
     * @var OrderItemMySQLRepositoryInterface
     */
    private $orderItemMySQLRepository;

    /**
     * @param OrderItemMySQLRepositoryInterface $orderItemMySQLRepository
     */
    public function __construct(OrderItemMySQLRepositoryInterface $orderItemMySQLRepository)
    {
        $this->orderItemMySQLRepository = $orderItemMySQLRepository;
    }

    /**
     * @inheritDoc
     */
    public function create(OrderItemDTO $orderItemDTO): OrderItemViewDTO
    {
        try {
            $orderItemPreparedModel = OrderTransformer::orderItemStoreDTOToModel($orderItemDTO);
            $orderItemModel = $this->orderItemMySQLRepository->create($orderItemPreparedModel);
            return OrderTransformer::orderItemModelToViewDTO($orderItemModel);
        } catch (\Throwable $throwable) {
            throw new RuntimeException($throwable->getMessage());
        }
    }

    public function getTotalPriceByOrderId(int $orderId): int
    {
        return $this->orderItemMySQLRepository->getPriceSumByOrderId($orderId);
    }
}
