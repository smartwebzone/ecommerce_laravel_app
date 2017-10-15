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

    public function school() {
        return $this->belongsToMany(School::class);
    }

}
