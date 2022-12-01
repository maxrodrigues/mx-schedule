<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Contracts\CustomerRepositoryContract;

class CustomerRepository extends BaseRepository implements CustomerRepositoryContract{

    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }
}
