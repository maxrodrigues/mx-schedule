<?php

namespace App\Repositories;

use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepositoryContract;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryContract
{
    protected $model;

    public function __construct(Schedule $model)
    {
        $this->model = $model;
    }
}
