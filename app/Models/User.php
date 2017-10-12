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
    protected $fillable = ['username', 'email', 'password', 'isAdmin', 'last_login', 'first_name', 'last_name', 'slug', 'uuid', 'referral_id', 'is_online', 'referred_by'];
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'password' => 'string',
        'permissions' => 'string',
        'username' => 'string',
        'email' => 'string',
        'isAdmin' => 'boolean',
        'slug' => 'string',
        'uuid' => 'string',
        'referral_id' => 'integer',
        'is_online' => 'string',
        'referred_by' => 'integer',
    ];

    public function setUuid($uuid) {
        return Uuid::generate(3, $this->first_name . $this->last_name, Uuid::NS_DNS);
    }


    public function get_fullname() {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages() {
        return $this->hasMany(Message::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders() {
        return $this->hasMany(Order::class);
    }

    /**
     * @method userInfo
     * @public
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userInfo() {
        return $this->hasOne(UserInfo::class);
    }

    public function userRating() {
        return $this->hasMany(\Craigzearfoss\UserRatings\UserRating::class);
    }

    public function locations() {
        return $this->hasMany(locations::class);
    }

    public function location() {
        return $this->belongsToMany(Location::class, 'location_user', 'user_id', 'location_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

}
