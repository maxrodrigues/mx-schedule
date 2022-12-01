<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CustomerServiceContract
{
    /**
     * Get all customers.
     *
     * @return Collection | null
     */
    public function listAllCustomers(): ?Collection;

    /**
     * Create new customer.
     *
     * @param  mixed $payload
     * @return Model | null
     */
    public function createNewCustomer(array $payload): ?Model;

}
