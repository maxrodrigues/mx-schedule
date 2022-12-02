<?php

namespace App\Providers;

use App\Repositories\Contracts\ScheduleRepositoryContract;
use App\Repositories\Contracts\ServiceRepositoryContract;
use App\Repositories\ScheduleRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\ServiceProvider;

class AllRepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceRepositoryContract::class, ServiceRepository::class);
        $this->app->bind(ScheduleRepositoryContract::class, ScheduleRepository::class);
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
