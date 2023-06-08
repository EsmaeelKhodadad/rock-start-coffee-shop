<?php

namespace App\Transformers;

use App\DTO\OrderAlongWithItemsStoreDTO;
use App\DTO\OrderItemDTO;
use App\DTO\OrderItemViewDTO;
use App\DTO\OrderStoreDTO;
use App\DTO\OrderViewDTO;
use App\Models\Order;
use App\Models\OrderItem;
use App\Requests\OrderStoreRequest;
use App\Resources\V1\OrderItemResource;
use Illuminate\Database\Eloquent\Model;

class OrderTransformer
{
    /**
     * @param int $userId
     * @return OrderStoreDTO
     */
    public static function toOrderStoreDTO(int $userId): OrderStoreDTO
    {
        return (new OrderStoreDTO())->setUserId($userId);
    }

    /**
     * @param OrderStoreDTO $orderStoreDTO
     * @return Order
     */
    public static function orderStoreDTOToModel(OrderStoreDTO $orderStoreDTO): Model
    {
        return (new Order())
            ->setAttribute('user_id', $orderStoreDTO->getUserId())
            ->setAttribute('status', $orderStoreDTO->getStatus());
    }

    /**
     * @param OrderItemDTO $orderItemDTO
     * @return OrderItem
     */
    public static function orderItemStoreDTOToModel(OrderItemDTO $orderItemDTO): OrderItem
    {
        return (new OrderItem())
            ->setAttribute('order_id', $orderItemDTO->getOrderId())
            ->setAttribute('product_id', $orderItemDTO->getProductId())
            ->setAttribute('customization_id', $orderItemDTO->getCustomizationId())
            ->setAttribute('option_id', $orderItemDTO->getOptionId())
            ->setAttribute('number', $orderItemDTO->getNumber());
    }

    /**
     * @param array $item
     * @return OrderItemDTO
     */
    public static function toOrderItemStoreDTO(array $item): OrderItemDTO
    {
        return (new OrderItemDTO())
            ->setOrderId($item['order_id'])
            ->setProductId($item['product_id'])
            ->setNumber($item['number'])
            ->setCustomizationId($item['customization_id'] ?? null)
            ->setOptionId($item['option_id'] ?? null);
    }

    /**
     * @param int $orderId
     * @param OrderStoreRequest $orderStoreRequest
     * @return OrderAlongWithItemsStoreDTO
     */
    public static function toOrderAlongWithItemsStoreDTO(int $orderId, OrderStoreRequest $orderStoreRequest): OrderAlongWithItemsStoreDTO
    {
        $orderItems = array_map(static function ($item) {
            return self::toOrderItemStoreDTO($item);
        }, $orderStoreRequest->order_items);

        return (new OrderAlongWithItemsStoreDTO())
            ->setOrderId($orderId)
            ->setOrderItems($orderItems);
    }

    /**
     * @param Order $order
     * @return OrderViewDTO
     */
    public static function orderModelToViewDTO(Model $order): OrderViewDTO
    {
        return (new OrderViewDTO())
            ->setUserId($order->getAttribute('id'))
            ->setStatus($order->getAttribute('status'))
            ->setCreatedAt($order->getAttribute('created_at'))
            ->setUpdatedAt($order->getAttribute('updated_at'));
    }

    /**
     * @param OrderItem $orderItem
     * @return OrderItemViewDTO
     */
    public static function orderItemModelToViewDTO(Model $orderItem): OrderItemViewDTO
    {
        return (new OrderItemViewDTO())
            ->setId($orderItem->id)
            ->setOrderId($orderItem->order_id)
            ->setProductId($orderItem->product_id)
            ->setCustomizationId($orderItem->customization_id)
            ->setOptionId($orderItem->option_id)
            ->setNumber($orderItem->number)
            ->setCreatedAt($orderItem->created_at)
            ->setCreatedAt($orderItem->updated_at);
    }
}
