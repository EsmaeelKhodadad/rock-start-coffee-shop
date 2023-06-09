<?php

namespace App\Repositories\MySQL\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductMySQLRepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithCustomizationsAndOptions(): LengthAwarePaginator;
}
