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
    private $numberId;
}
