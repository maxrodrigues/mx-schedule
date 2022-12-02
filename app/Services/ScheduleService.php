<?php

namespace App\Services;

use App\Repositories\Contracts\ScheduleRepositoryContract;
use App\Services\Contracts\ScheduleServiceContract;

class ScheduleService implements ScheduleServiceContract
{
    private $scheduleRepository;

    public function __construct(ScheduleRepositoryContract $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }
}
