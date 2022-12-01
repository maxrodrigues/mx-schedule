<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CustomerRepositoryContract;
use App\Services\Contracts\CustomerServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListCustomerController extends Controller
{
    /**
     * customerService
     *
     * @var mixed
     */
    private $customerService;

    public function __construct(CustomerServiceContract $customerService)
    {
        $this->customerService = $customerService;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $all = $this->customerService->listAllCustomers();

            return new JsonResponse([
                'message' => $all
            ], Response::HTTP_OK);
        } catch (\Exception $e) {

            return new JsonResponse([
                'message' => 'Erro'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
