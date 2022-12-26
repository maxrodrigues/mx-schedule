<?php

namespace App\Services;

use App\Repositories\Contracts\CompanyRepositoryContract;
use App\Services\Contracts\CompanyServiceContract;
use Illuminate\Database\Eloquent\Model;

class CompanyService implements CompanyServiceContract
{
    /**
     * companyRepository
     *
     * @var CompanyRepositoryContract
     */
    private $companyRepository;

    /**
     * __construct
     *
     * @param  CompanyRepositoryContract $companyRepository
     * @return void
     */
    public function __construct(CompanyRepositoryContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompany($id): ?Model
    {
        return $this->companyRepository->findById($id);
    }
}
