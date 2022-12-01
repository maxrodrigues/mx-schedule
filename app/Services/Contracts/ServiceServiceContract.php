<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ServiceServiceContract
{
    /**
     * List all services.
     *
     * @return Collection
     */
    public function listAllServices(): ?Collection;
}
