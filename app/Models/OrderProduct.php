<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order.
 *
 */
class OrderProduct extends Model implements ModelInterface {


    protected $guarded = ['id'];
    public $table = 'order_product';
    public $timestamps = false;
    public function book() {
        return $this->belongsToMany(Book::class, 'order_product_book', 'order_product_id', 'book_id')->withPivot('name','description');
    }
}