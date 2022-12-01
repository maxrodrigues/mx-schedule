<?php

namespace App\Services;

use App\Repositories\Contracts\ServiceRepositoryContract;
use App\Services\Contracts\ServiceServiceContract;
use Illuminate\Database\Eloquent\Collection;

class ServiceService implements ServiceServiceContract
{
    private $serviceRepository;

    public function __construct(ServiceRepositoryContract $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * List all services.
     *
     * @return Collection
     */
    public function listAllServices(): ?Collection
    {
        $all = $this->serviceRepository->all();

        return $all;
    }
}
