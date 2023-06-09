<?php

namespace App\DTO;

class OrderItemDTO extends BaseDTO
{
    /**
     * @var int
     */
    private $orderId;
    /**
     * @var int
     */
    private $productId;
    /**
     * @var null|int
     */
    private $customizationId;
    /**
     * @var null|int
     */
    private $optionId;
    /**
     * @var int
     */
    private $number;
    /**
     * @var null|int
     */
    private $totalPrice;

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
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return $this
     */
    public function setProductId(int $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomizationId(): ?int
    {
        return $this->customizationId;
    }

    /**
     * @param int|null $customizationId
     * @return $this
     */
    public function setCustomizationId(?int $customizationId): self
    {
        $this->customizationId = $customizationId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getOptionId(): ?int
    {
        return $this->optionId;
    }

    /**
     * @param int|null $optionId
     * @return $this
     */
    public function setOptionId(?int $optionId): self
    {
        $this->optionId = $optionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return $this
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalPrice(): ?int
    {
        return $this->totalPrice;
    }

    /**
     * @param int|null $totalPrice
     * @return $this
     */
    public function setTotalPrice(?int $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }
}
