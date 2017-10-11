<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class School.
 *
 */
class School extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'school_master';
    public $timestamps = false;
    
     public static $rules = [
        'name' => 'required|min:3|unique:school_master,name,3',
        'phone' => 'required',
        'email' => 'required',
        'city' => 'required',
        'area' => 'required',
        'state' => 'required',
    ];

}
