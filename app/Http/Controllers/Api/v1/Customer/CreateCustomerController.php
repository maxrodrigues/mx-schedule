<?php

namespace App\Http\Controllers\Api\v1\Customer;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CustomerServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateCustomerController extends Controller
{
    /**
     * customerService
     *
     * @var mixed
     */
    private $customerService;

    /**
     * __construct
     *
     * @param  mixed $customerService
     * @return void
     */
    public function __construct(CustomerServiceContract $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * __invoke
     *
     * @param  mixed $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $customer = $this->customerService->createNewCustomer($request->all());
            return new JsonResponse(['message' => $customer], Response::HTTP_OK);
        }catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
