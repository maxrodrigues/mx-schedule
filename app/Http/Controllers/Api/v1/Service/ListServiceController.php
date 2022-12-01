<?php

namespace App\Http\Controllers\Api\v1\Service;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ServiceServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListServiceController extends Controller
{
    private $serviceService;

    public function __construct(ServiceServiceContract $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $services = $this->serviceService->listAllServices();

            return new JsonResponse([
                'message' => $services
            ], Response::HTTP_OK);
        } catch (\Exception $e) {

            return new JsonResponse([
                'message' => 'Erro'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
