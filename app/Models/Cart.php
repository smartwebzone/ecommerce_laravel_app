<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart.
 *
 */
class Cart extends Model implements ModelInterface {

    protected $guarded = ['id'];
    public $table = 'cart';
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
