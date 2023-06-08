<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Requests\OrderStoreRequest;
use App\Services\Interfaces\OrderServiceInterface;
use App\Transformers\OrderTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
     * @param OrderStoreRequest $orderStoreRequest
     * @return JsonResponse
     */
    public function store(OrderStoreRequest $orderStoreRequest): JsonResponse
    {
        $orderStoreDTO = OrderTransformer::toOrderStoreDTO(Auth::loginUsingId(2)->getAuthIdentifier());
    }
}
