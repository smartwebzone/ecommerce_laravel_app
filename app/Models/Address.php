<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address.
 *
 */
class Address extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'address_master';
    public $timestamps = false;

    public function users() {
        return $this->belongsToMany(User::class, 'address_user', 'address_id', 'user_id');
    }


}
