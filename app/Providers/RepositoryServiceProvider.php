<?php

namespace App\Providers;

use App\Services\Implementations\ProductService;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
    }
}
