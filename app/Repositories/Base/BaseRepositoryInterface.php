<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * @param Model $model
     * @return Model
     */
    public function create(Model $model): Model;

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);
}
