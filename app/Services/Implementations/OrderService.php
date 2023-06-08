<?php

namespace App\Services\Implementations;

use App\DTO\OrderStoreDTO;
use App\DTO\OrderViewDTO;
use App\Repositories\MySQL\Interfaces\OrderMySQLRepositoryInterface;
use App\Requests\OrderStoreRequest;
use App\Resources\V1\OrderViewResource;
use App\Services\Interfaces\OrderItemServiceInterface;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Transformers\OrderTransformer;
use http\Exception\RuntimeException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @param OrderMySQLRepositoryInterface $orderMySQLRepository
     * @param OrderItemServiceInterface $orderItemService
     * @param UserServiceInterface $userService
     */
    public function __construct(OrderMySQLRepositoryInterface $orderMySQLRepository, OrderItemServiceInterface $orderItemService, UserServiceInterface $userService)
    {
        $this->orderMySQLRepository = $orderMySQLRepository;
        $this->orderItemService = $orderItemService;
        $this->userService = $userService;
    }

    /**
     * @inheritDoc
     */
    public function getAllUserOrders(int $userId):AnonymousResourceCollection
    {
        try{
            $userViewDTo = $this->userService->getById($userId);
            $orders = $this->orderMySQLRepository->getAllByUserId($userViewDTo->getId());
            return OrderViewResource::collection($orders);
        }
        catch(\Throwable $throwable){
            throw new RuntimeException($throwable->getMessage());
        }
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
