<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryContract;

class CompanyRepository extends BaseRepository implements CompanyRepositoryContract
{
    /**
     * model
     *
     * @var mixed
     */
    protected $model;

    /**
     * __construct
     *
     * @param  Company $model
     * @return void
     */
    public function __construct(Company $model)
    {
        $this->model = $model;
    }

}
