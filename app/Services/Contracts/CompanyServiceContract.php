<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Exception;

interface CompanyServiceContract
{
    /**
     * getCompany
     *
     * @param  mixed $id
     * @return Model
     */
    public function getCompany($id): ?Model;


    /**
     * @param int $companyId
     * @param array $attributes
     * @return bool
     */
    public function updateCompany(int $companyId, array $attributes): bool;


}
