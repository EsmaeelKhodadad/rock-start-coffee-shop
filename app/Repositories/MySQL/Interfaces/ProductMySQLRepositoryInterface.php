<?php

namespace App\Repositories\MySQL\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductMySQLRepositoryInterface
{
    public function getAllWithCustomizationsAndOptions(): LengthAwarePaginator;
}
