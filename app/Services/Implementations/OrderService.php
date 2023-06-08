<?php

namespace App\Services\Implementations;

use App\DTO\OrderStoreDTO;
use App\DTO\OrderViewDTO;
use App\Repositories\MySQL\Interfaces\OrderMySQLRepositoryInterface;
use App\Requests\OrderStoreRequest;
use App\Services\Interfaces\OrderItemServiceInterface;
use App\Services\Interfaces\OrderServiceInterface;
use App\Transformers\OrderTransformer;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    /**
     * @var OrderMySQLRepositoryInterface
     */
    private $orderMySQLRepository;
    /**
     * @var OrderItemServiceInterface
     */
    private $orderItemService;

    /**
     * @param OrderMySQLRepositoryInterface $orderMySQLRepository
     * @param OrderItemServiceInterface $orderItemService
     */
    public function __construct(OrderMySQLRepositoryInterface $orderMySQLRepository, OrderItemServiceInterface $orderItemService)
    {
        $this->orderMySQLRepository = $orderMySQLRepository;
        $this->orderItemService = $orderItemService;
    }

    /**
     * @inheritDoc
     */
    public function create(OrderStoreDTO $orderStoreDTO, OrderStoreRequest $orderStoreRequest): OrderViewDTO
    {
        try {
            DB::beginTransaction();
            $orderPreparedModel = OrderTransformer::orderStoreDTOToModel($orderStoreDTO);
            $orderModel = $this->orderMySQLRepository->create($orderPreparedModel);
            $orderViewDTO = OrderTransformer::orderModelToViewDTO($orderModel);
            $orderAlongWithItemsStoreDTO = OrderTransformer::toOrderAlongWithItemsStoreDTO($orderViewDTO->getId(), $orderStoreRequest);
            foreach ($orderAlongWithItemsStoreDTO->getOrderItems() as $item) {
                $this->orderItemService->create($item);
            }
            DB::commit();
            return $orderViewDTO;
        } catch (\Throwable $throwable) {
            DB::rollBack();
            throw new \RuntimeException($throwable->getMessage());
        }
    }
}
