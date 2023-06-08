<?php

namespace App\Services\Implementations;

use App\Repositories\MySQL\Interfaces\ProductMySQLRepositoryInterface;
use App\Resources\V1\ProductResource;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductMySQLRepositoryInterface
     */
    private $productMySQLRepository;

    /**
     * @param ProductMySQLRepositoryInterface $productMySQLRepository
     */
    public function __construct(ProductMySQLRepositoryInterface $productMySQLRepository)
    {
        $this->productMySQLRepository = $productMySQLRepository;
    }

    /**
     * @inheritDoc
     */
    public function getAllWithCustomizationsAndOptions(): AnonymousResourceCollection
    {
        $products = $this->productMySQLRepository->getAllWithCustomizationsAndOptions();
        return ProductResource::collection($products);
    }
}
