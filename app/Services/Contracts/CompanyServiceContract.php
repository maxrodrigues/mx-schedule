<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;

interface CompanyServiceContract
{
    /**
     * getCompany
     *
     * @param  mixed $id
     * @return Model
     */
    public function getCompany($id): ?Model;
}
