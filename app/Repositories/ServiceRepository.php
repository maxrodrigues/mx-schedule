<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryContract;

class ServiceRepository extends BaseRepository implements ServiceRepositoryContract
{
    protected $model;

    public function __construct(Service $model)
    {
        $this->model = $model;
    }
}
