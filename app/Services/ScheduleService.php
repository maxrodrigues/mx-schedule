<?php

namespace App\Services;

use App\Repositories\Contracts\ScheduleRepositoryContract;
use App\Repositories\ServiceRepository;
use App\Services\Contracts\ScheduleServiceContract;

class ScheduleService implements ScheduleServiceContract
{
    private $scheduleRepository;
    private $serviceRepository;

    public function __construct(
        ScheduleRepositoryContract $scheduleRepository,
        ServiceRepository $serviceRepository,
    )
    {
        $this->scheduleRepository = $scheduleRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function createNewSchedule(array $payload)
    {
        foreach($payload['services'] as $service) {
            $foundService = $this->serviceRepository->findById($service['id']);
        }
    }
}
