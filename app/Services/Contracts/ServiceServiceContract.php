<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ServiceServiceContract
{
    /**
     * List all services.
     *
     * @return Collection
     */
    public function listAllServices(): ?Collection;


    /**
     * Create new service.
     *
     * @param  mixed $payload
     * @return Model | null
     */
    public function createNewService(array $payload): ?Model;

}
