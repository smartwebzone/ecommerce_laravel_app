<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Standard.
 *
 */
class Standard extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'standard_master';
    public $timestamps = false;
    
     public static $rules = [
        'name' => 'required|min:3|unique:standard_master,name,3',
        'description' => 'required',
        'status' => 'required',
        'school_id' => 'required',
    ];
    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }


}
