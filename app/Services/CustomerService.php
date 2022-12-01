<?php

namespace App\Services;

use App\Repositories\Contracts\CustomerRepositoryContract;
use App\Services\Contracts\CustomerServiceContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CustomerService implements CustomerServiceContract {

    /**
     * @var CustomerRepositoryContract
     */
    private $customerRepository;

    /**
     * __construct
     *
     * @param  CustomerRepositoryContract $customerRepository
     * @return void
     */
    public function __construct(CustomerRepositoryContract $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Get all customers.
     *
     * @return Collection | null
     */
    public function listAllCustomers(): ?Collection
    {
        $all = $this->customerRepository->all();

        return $all;
    }

    /**
     * Create new customer
     *
     * @param  array $payload
     * @return Model | null
     */
    public function createNewCustomer(array $payload): ?Model
    {
        $customer = $this->customerRepository->create($payload);

        return $customer;
    }
}
