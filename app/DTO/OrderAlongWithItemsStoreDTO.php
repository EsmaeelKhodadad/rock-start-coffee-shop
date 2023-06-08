<?php

namespace App\DTO;

use App\Resources\V1\OrderItemStoreResource;

class OrderAlongWithItemsStoreDTO extends BaseDTO
{
    /**
     * @var int
     */
    private $orderId;
    /**
     * @var OrderItemDTO[]
     */
    private $orderItems;

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return $this
     */
    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return OrderItemStoreResource[]
     */
    public function getOrderItems(): array
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItemStoreResource[] $orderItems
     * @return $this
     */
    public function setOrderItems(array $orderItems): self
    {
        $this->orderItems = $orderItems;
        return $this;
    }
}
