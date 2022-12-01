<?php

namespace App\Providers;

use App\Services\Contracts\CustomerServiceContract;
use App\Services\Contracts\ServiceServiceContract;
use App\Services\CustomerService;
use App\Services\ServiceService;
use Illuminate\Support\ServiceProvider;

class AllServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerServiceContract::class, CustomerService::class);
        $this->app->bind(ServiceServiceContract::class, ServiceService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
