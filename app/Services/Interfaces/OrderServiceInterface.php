<?php

namespace App\Services\Interfaces;

use App\DTO\OrderStoreDTO;
use App\DTO\OrderViewDTO;
use App\Requests\OrderStoreRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface OrderServiceInterface
{
    /**
     * @param OrderStoreDTO $orderStoreDTO
     * @param OrderStoreRequest $orderStoreRequest
     * @return OrderViewDTO
     */
    public function create(OrderStoreDTO $orderStoreDTO, OrderStoreRequest $orderStoreRequest): OrderViewDTO;

    /**
     * @param int $userId
     * @return AnonymousResourceCollection
     */
    public function getAllUserOrders(int $userId):AnonymousResourceCollection;
}
