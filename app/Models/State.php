<?php

namespace App\Models;

use Eloquent as Model;

class State extends Model {

    public $table = 'state_master';
    public $fillable = [
        'id',
        'code',
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'name' => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'code' => 'required',
        'name' => 'required',
    ];

}
