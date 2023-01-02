<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface CompanyRepositoryContract extends BaseRepositoryContract
{
    public function slugExists(string $slug): ?Model;
}
