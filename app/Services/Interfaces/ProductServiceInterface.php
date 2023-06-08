<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

interface ProductServiceInterface
{
    /**
     * @return AnonymousResourceCollection
     */
    public function getAllWithCustomizationsAndOptions(): AnonymousResourceCollection;
}
