<?php

namespace App\Models;

use Webpatser\Uuid\Uuid;
use Cartalyst\Sentinel\Users\EloquentUser;
use Craigzearfoss\UserRatings\UserRatableTrait;
use Sentinel;

class User extends EloquentUser {

    use UserRatableTrait;

    protected $table = 'users';
    protected $guarded = ['id'];
    protected $fillable = ['isAdmin', 'uuid', 'email', 'password', 'mobile', 'last_login', 'first_name', 'middle_name', 'last_name'];

    public function setUuid($uuid) {
        return Uuid::generate(3, $this->first_name . $this->last_name, Uuid::NS_DNS);
    }

    public function get_fullname() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

}
