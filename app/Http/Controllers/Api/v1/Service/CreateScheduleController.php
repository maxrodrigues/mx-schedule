<?php

namespace App\Http\Controllers\Api\v1\Service;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ScheduleServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateScheduleController extends Controller
{
    private $scheduleService;

    public function __construct(ScheduleServiceContract $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            // $this->scheduleService->createNewSchedule($request->all());

            return new JsonResponse([
                'message' => __('messages.default.schedule')
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {

            return new JsonResponse([
                'message' => "Erro {$e->getMessage()}"
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
