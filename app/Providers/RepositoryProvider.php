<?php

namespace App\Providers;

use App\Repositories\MySQL\Implementations\ProductMySQLRepository;
use App\Repositories\MySQL\Interfaces\ProductMySQLRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ProductMySQLRepositoryInterface::class, ProductMySQLRepository::class);
    }
}
