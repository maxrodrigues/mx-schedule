<?php

namespace App\Services\Contracts;

interface ScheduleServiceContract
{
    public function createNewSchedule(array $payload);
}
