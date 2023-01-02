<?php

namespace App\Http\Controllers\Api\v1\Company;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class UpdateCompanyController extends Controller
{

    public function __construct(private CompanyServiceContract $companyService)
    {
        //
    }

    public function __invoke($id, Request $request): JsonResponse|string
    {
        try {
            $this->companyService->updateCompany($id, $request->all());
            return new JsonResponse(['message' => __("default.update_successful")], Response::HTTP_OK);
        }catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
