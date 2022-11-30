<?php

namespace App\Http\Controllers\Api\v1\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateServiceController extends Controller
{
    public function __construct()
    {

    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            return new JsonResponse([
                'message' => $request->all()
            ], Response::HTTP_OK);
        } catch (\Exception $e) {

            return new JsonResponse([
                'message' => 'Erro'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
