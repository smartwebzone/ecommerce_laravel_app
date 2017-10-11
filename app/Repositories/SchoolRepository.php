<?php

namespace App\Repositories;

use App\Models\School;

class SchoolRepository extends BaseRepository
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
        return School::class;
    }
}
