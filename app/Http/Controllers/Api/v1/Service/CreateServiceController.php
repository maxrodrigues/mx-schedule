<?php

namespace App\Http\Controllers\Api\v1\Service;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ServiceServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateServiceController extends Controller
{
    private $serviceService;

    public function __construct(ServiceServiceContract $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $service = $this->serviceService->createNewService($request->all());

            return new JsonResponse([
                'message' => $service
            ], Response::HTTP_OK);
        } catch (\Exception $e) {

            return new JsonResponse([
                'message' => 'Erro'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
