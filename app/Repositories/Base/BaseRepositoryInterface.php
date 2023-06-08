<?php

namespace App\Repositories\Base;

use App\DTO\BaseDTO;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * @param Model $model
     * @return Model
     */
    public function create(Model $model): Model;
}
