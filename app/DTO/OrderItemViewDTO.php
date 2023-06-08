<?php

namespace App\DTO;

use Carbon\Carbon;

class OrderItemViewDTO extends BaseDTO
{
    /**
     * @var int
     */
    private $id;
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
     * @var null|Carbon
     */
    private $createdAt;
    /**
     * @var null|Carbon
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

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
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon|null $createdAt
     * @return $this
     */
    public function setCreatedAt(?Carbon $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon|null $updatedAt
     * @return $this
     */
    public function setUpdatedAt(?Carbon $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
