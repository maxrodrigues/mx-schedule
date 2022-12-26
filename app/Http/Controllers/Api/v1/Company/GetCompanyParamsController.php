<?php

namespace App\Http\Controllers\Api\v1\Company;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GetCompanyParamsController extends Controller
{
    /**
     * companyService
     *
     * @var CompanyServiceContract
     */
    private $companyService;

    /**
     * __construct
     *
     * @param  CompanyServiceContract $companyService
     * @return void
     */
    public function __construct(CompanyServiceContract $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * __invoke
     *
     * @param  mixed $id
     * @return void
     */
    public function __invoke($id)
    {
        try{
            $company = $this->companyService->getCompany($id);

            return new JsonResponse(['message' => $company], Response::HTTP_OK);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
