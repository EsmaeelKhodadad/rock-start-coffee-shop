<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\BaseController;
use App\Requests\OrderStoreRequest;
use App\Requests\OrderUpdateRequest;
use App\Services\Interfaces\OrderServiceInterface;
use App\Transformers\OrderTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderController extends BaseController
{
    /**
     * @var OrderServiceInterface
     */
    private $orderService;

    /**
     * @param OrderServiceInterface $orderService
     */
    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $userId = Auth::loginUsingId(2)->getAuthIdentifier();
        $orders = $this->orderService->getAllUserOrders($userId);
        return $this->response($orders->toArray(request()));
    }

    /**
     * @param OrderStoreRequest $orderStoreRequest
     * @return JsonResponse
     */
    public function store(OrderStoreRequest $orderStoreRequest): JsonResponse
    {
        $orderStoreDTO = OrderTransformer::toOrderStoreDTO(Auth::loginUsingId(2)->getAuthIdentifier());
        $this->orderService->create($orderStoreDTO, $orderStoreRequest);
        return $this->response([], ResponseAlias::HTTP_CREATED, 'Created');
    }

    /**
     * @param int $orderId
     * @param OrderUpdateRequest $orderUpdateRequest
     * @return JsonResponse
     */
    public function update(int $orderId, OrderUpdateRequest $orderUpdateRequest): JsonResponse
    {
        $orderUpdateDTO = OrderTransformer::toOrderUpdateDTO($orderId, $orderUpdateRequest);
        $this->orderService->updateById($orderId, $orderUpdateDTO);
        return $this->response([], ResponseAlias::HTTP_OK, 'Updated');
    }

    /**
     * @param int $orderId
     * @return JsonResponse
     */
    public function delete(int $orderId): JsonResponse
    {
        $this->orderService->deleteById($orderId);
        return $this->response([], ResponseAlias::HTTP_NO_CONTENT, 'Deleted');
    }
}
