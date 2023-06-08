<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface OrderServiceInterface
{
    /**
     * @return AnonymousResourceCollection
     */
    public function create(Model $model);
}
