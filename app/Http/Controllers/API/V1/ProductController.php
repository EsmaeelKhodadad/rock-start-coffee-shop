<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\BaseController;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\JsonResponse;

class ProductController extends BaseController
{
    /**
     * @var ProductServiceInterface
     */
    private $productService;

    /**
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->getAllWithCustomizationsAndOptions();
        return $this->response($products->toArray(request()));
    }
}
