<?php

namespace App\Services\Interfaces;

use App\DTO\OrderStoreDTO;
use App\DTO\OrderUpdateDTO;
use App\DTO\OrderViewDTO;
use App\Requests\OrderStoreRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface OrderServiceInterface
{
    /**
     * @param int $userId
     * @return AnonymousResourceCollection
     */
    public function getAllUserOrders(int $userId): AnonymousResourceCollection;

    /**
     * @param int $orderId
     * @return int
     */
    public function getTotalPriceById(int $orderId): int;

    /**
     * @param int $orderId
     * @return OrderViewDTO
     */
    public function getById(int $orderId): OrderViewDTO;

    /**
     * @param OrderStoreDTO $orderStoreDTO
     * @param OrderStoreRequest $orderStoreRequest
     * @return OrderViewDTO
     */
    public function create(OrderStoreDTO $orderStoreDTO, OrderStoreRequest $orderStoreRequest): OrderViewDTO;

    /**
     * @param int $orderId
     * @return mixed
     */
    public function deleteById(int $orderId);

    /**
     * @param int $orderId
     * @param OrderUpdateDTO $orderUpdateDTO
     * @return OrderViewDTO
     */
    public function updateById(int $orderId, OrderUpdateDTO $orderUpdateDTO): OrderViewDTO;
}
