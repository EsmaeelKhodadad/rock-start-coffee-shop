<?php

namespace App\Providers;

use App\Repositories\MySQL\Implementations\OrderItemMySQLRepository;
use App\Repositories\MySQL\Implementations\OrderMySQLRepository;
use App\Repositories\MySQL\Implementations\ProductMySQLRepository;
use App\Repositories\MySQL\Implementations\UserMySQLRepository;
use App\Repositories\MySQL\Interfaces\OrderItemMySQLRepositoryInterface;
use App\Repositories\MySQL\Interfaces\OrderMySQLRepositoryInterface;
use App\Repositories\MySQL\Interfaces\ProductMySQLRepositoryInterface;
use App\Repositories\MySQL\Interfaces\UserMySQLRepositoryInterface;
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
        $this->app->singleton(OrderMySQLRepositoryInterface::class, OrderMySQLRepository::class);
        $this->app->singleton(OrderItemMySQLRepositoryInterface::class, OrderItemMySQLRepository::class);
        $this->app->singleton(UserMySQLRepositoryInterface::class, UserMySQLRepository::class);
    }
}
