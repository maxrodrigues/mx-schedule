<?php

namespace App\Services;

use App\Repositories\Contracts\CustomerRepositoryContract;
use App\Services\Contracts\CustomerServiceContract;
use Illuminate\Database\Eloquent\Collection;

class CustomerService implements CustomerServiceContract {

    private $customerRepository;

    public function __construct(CustomerRepositoryContract $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function listAllCustomers(): ?Collection
    {
        $all = $this->customerRepository->all();

        return $all;
    }
}
