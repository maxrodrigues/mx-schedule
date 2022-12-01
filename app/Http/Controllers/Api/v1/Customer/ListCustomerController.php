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
     * @var CustomerServiceContract
     */
    private $customerService;

    /**
     * __construct
     *
     * @param  CustomerServiceContract $customerService
     * @return void
     */
    public function __construct(CustomerServiceContract $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * __invoke
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
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
