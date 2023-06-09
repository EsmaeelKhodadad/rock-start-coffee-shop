<?php

namespace App\Repositories\MySQL\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface OrderMySQLRepositoryInterface
{
    /**
     * @param int $userId
     * @return mixed
     */
    public function getAllByUserId(int $userId): LengthAwarePaginator;

    /**
     * @param int $orderId
     * @return void
     */
    public function deleteById(int $orderId): void;

    /**
     * @param int $orderId
     * @param int $userId
     * @return mixed
     */
    public function getByOrderIdAndUserId(int $orderId, int $userId);
}
