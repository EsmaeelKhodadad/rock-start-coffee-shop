<?php

namespace App\Services\Implementations;

use App\DTO\OrderItemDTO;
use App\DTO\OrderItemViewDTO;
use App\Repositories\MySQL\Interfaces\OrderItemMySQLRepositoryInterface;
use App\Services\Interfaces\CustomizationServiceInterface;
use App\Services\Interfaces\OptionServiceInterface;
use App\Services\Interfaces\OrderItemServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Transformers\OrderTransformer;

class OrderItemService implements OrderItemServiceInterface
{
    /**
     * @var OrderItemMySQLRepositoryInterface
     */
    private $orderItemMySQLRepository;

    /**
     * @var ProductServiceInterface
     */
    private $productService;
    /**
     * @var CustomizationServiceInterface
     */
    private $customizationService;
    /**
     * @var OptionServiceInterface
     */
    private $optionService;

    /**
     * @param OrderItemMySQLRepositoryInterface $orderItemMySQLRepository
     * @param ProductServiceInterface $productService
     * @param CustomizationServiceInterface $customizationService
     * @param OptionServiceInterface $optionService
     */
    public function __construct(
        OrderItemMySQLRepositoryInterface $orderItemMySQLRepository,
        ProductServiceInterface           $productService,
        CustomizationServiceInterface     $customizationService,
        OptionServiceInterface            $optionService
    )
    {
        $this->orderItemMySQLRepository = $orderItemMySQLRepository;
        $this->productService = $productService;
        $this->customizationService = $customizationService;
        $this->optionService = $optionService;
    }

    /**
     * @inheritDoc
     */
    public function create(OrderItemDTO $orderItemDTO): OrderItemViewDTO
    {
        try {
            $doesProductIdExist = $this->productService->doesIdExist($orderItemDTO->getProductId());
            $doesCustomizationIdExist = $this->customizationService->doesIdExist($orderItemDTO->getCustomizationId());
            $doesOptionIdExist = $this->optionService->doesIdExist($orderItemDTO->getOptionId());
            if (!$doesProductIdExist || !$doesCustomizationIdExist || !$doesOptionIdExist) {
                throw new \RuntimeException('One or more id do not exist!');
            }
            $orderItemPreparedModel = OrderTransformer::orderItemStoreDTOToModel($orderItemDTO);
            $orderItemModel = $this->orderItemMySQLRepository->create($orderItemPreparedModel);
            return OrderTransformer::orderItemModelToViewDTO($orderItemModel);
        } catch (\Throwable $throwable) {
            throw new \RuntimeException($throwable->getMessage());
        }
    }

    public function getTotalPriceByOrderId(int $orderId): int
    {
        return $this->orderItemMySQLRepository->getPriceSumByOrderId($orderId);
    }

    /**
     * @inheritDoc
     */
    public function deleteByOrderId(int $orderId): void
    {
        $this->orderItemMySQLRepository->deleteByOrderId($orderId);
    }
}
