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
     * @return Model|null
     */
    public function getById(int $id): ?Model;

    /**
     * @param Model $model
     * @return Model
     */
    public function update(Model $model): Model;
}
