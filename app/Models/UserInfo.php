<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model {

    protected $table = 'userinfo';
    protected $primaryKey = 'user_id';
    public $fillable = [
        'user_id',
        'is_employee',
        'photo',
        'about_me',
        'website',
        'company',
        'gender',
        'phone',
        'mobile',
        'work',
        'other',
        'is_published',
        'is_active',
        'dob',
        'skypeid',
        'githubid',
        'twitter_username',
        'instagram_username',
        'facebook_username',
        'facebook_url',
        'linked_in_url',
        'google_plus_url',
        'slug',
        'display_name',
    ];
    protected $casts = [
        'is_employee' => 'boolean',
        'photo' => 'string',
        'about_me' => 'string',
        'website' => 'string',
        'company' => 'string',
        'gender' => 'string',
        'phone' => 'string',
        'mobile' => 'string',
        'work' => 'string',
        'other' => 'string',
        'is_published' => 'boolean',
        'is_active' => 'boolean',
        'skypeid' => 'string',
        'githubid' => 'string',
        'twitter_username' => 'string',
        'instagram_username' => 'string',
        'facebook_username' => 'string',
        'facebook_url' => 'string',
        'linked_in_url' => 'string',
        'google_plus_url' => 'string',
        'slug' => 'string',
        'display_name' => 'string',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getDobAttribute($value) {
        if ($value == '0000-00-00 00:00:00') {
            return NULL;
        } else if ($value) {
            return Carbon::parse($value)->format('m/d/Y');
        } else {

            return $value;
        }
    }
    public function getPhotoAttribute($value) {
        if (!$value) {
            return 'http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60';
        } else {

            return url('/').$value;
        }
    }

//    public function setDobAttribute($value) {
//        
//        if ($value) {
//            //dd(Carbon::parse($value)->format('Y-m-d H:i:s'));
//            return Carbon::parse($value)->format('Y-m-d H:i:s');
//        } else {
//
//            return NULL;
//        }
//    }

}
