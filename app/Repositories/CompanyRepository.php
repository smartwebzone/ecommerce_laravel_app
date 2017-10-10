<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Company::class;
    }
}
