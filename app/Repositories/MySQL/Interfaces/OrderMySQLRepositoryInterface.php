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
}
