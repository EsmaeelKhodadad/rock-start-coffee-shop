<?php

namespace App\Providers;

use App\Services\Implementations\CustomizationService;
use App\Services\Implementations\OptionService;
use App\Services\Implementations\OrderItemService;
use App\Services\Implementations\OrderService;
use App\Services\Implementations\ProductService;
use App\Services\Implementations\UserService;
use App\Services\Interfaces\CustomizationServiceInterface;
use App\Services\Interfaces\OptionServiceInterface;
use App\Services\Interfaces\OrderItemServiceInterface;
use App\Services\Interfaces\OrderServiceInterface;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
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
        $this->app->singleton(OrderServiceInterface::class, OrderService::class);
        $this->app->singleton(OrderItemServiceInterface::class, OrderItemService::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(CustomizationServiceInterface::class, CustomizationService::class);
        $this->app->singleton(OptionServiceInterface::class, OptionService::class);
    }
}
