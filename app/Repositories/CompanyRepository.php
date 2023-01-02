<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryContract;
use Illuminate\Database\Eloquent\Model;

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

    public function slugExists(string $slug): ?Model
    {
        return $this->model->where('slug', $slug)->first();
    }

}
