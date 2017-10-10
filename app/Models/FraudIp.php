<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraudIp extends Model {

    protected $table = 'fraud_ips';
    protected $guarded = ['ip_addr'];
    //
}
