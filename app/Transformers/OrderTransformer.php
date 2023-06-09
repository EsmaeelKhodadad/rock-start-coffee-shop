<?php

namespace App\Transformers;

use App\DTO\OrderAlongWithItemsStoreDTO;
use App\DTO\OrderItemDTO;
use App\DTO\OrderItemViewDTO;
use App\DTO\OrderStoreDTO;
use App\DTO\OrderUpdateDTO;
use App\DTO\OrderViewDTO;
use App\Models\Order;
use App\Models\OrderItem;
use App\Requests\OrderStoreRequest;
use App\Requests\OrderUpdateRequest;
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
     * @param int $orderId
     * @param array $item
     * @return OrderItemDTO
     */
    public static function toOrderItemStoreDTO(int $orderId, array $item): OrderItemDTO
    {
        return (new OrderItemDTO())
            ->setOrderId($orderId)
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
        $orderItems = array_map(static function ($item) use ($orderId) {
            return self::toOrderItemStoreDTO($orderId, $item);
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
            ->setId($order->id)
            ->setUserId($order->user_id)
            ->setStatus($order->status)
            ->setCreatedAt($order->created_at)
            ->setUpdatedAt($order->updated_at);
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

    /**
     * @param int $orderId
     * @param OrderUpdateRequest $orderUpdateRequest
     * @return OrderUpdateDTO
     */
    public static function toOrderUpdateDTO(int $orderId, OrderUpdateRequest $orderUpdateRequest): OrderUpdateDTO
    {
        return (new OrderUpdateDTO())
            ->setStatus($orderUpdateRequest->status);
    }

    /**
     * @param Order $order
     * @param OrderUpdateDTO $orderUpdateDTO
     * @return Model
     */
    public static function orderUpdateDTOToModel(Order $order, OrderUpdateDTO $orderUpdateDTO): Model
    {
        $order->status = $orderUpdateDTO->getStatus() ?? $order->status;
        $order->user_id = $orderUpdateDTO->getUserId() ?? $order->user_id;
        return $order;
    }
}
