<?php

namespace App\Providers;

use App\Services\Contracts\CustomerServiceContract;
use App\Services\CustomerService;
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
