<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School.
 *
 */
class Missingstandard extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'missing_standards';
    public $timestamps = false;

}
