<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CustomerServiceContract
{
    public function listAllCustomers(): ?Collection;
}
