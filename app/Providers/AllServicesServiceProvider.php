<?php

namespace App\Providers;

use App\Services\CompanyService;
use App\Services\Contracts\CompanyServiceContract;
use App\Services\Contracts\CustomerServiceContract;
use App\Services\Contracts\ScheduleServiceContract;
use App\Services\Contracts\ServiceServiceContract;
use App\Services\CustomerService;
use App\Services\ScheduleService;
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
        $this->app->bind(CompanyServiceContract::class, CompanyService::class);
        $this->app->bind(CustomerServiceContract::class, CustomerService::class);
        $this->app->bind(ServiceServiceContract::class, ServiceService::class);
        $this->app->bind(ScheduleServiceContract::class, ScheduleService::class);
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
