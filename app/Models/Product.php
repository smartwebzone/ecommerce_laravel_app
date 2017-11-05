<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product.
 *
 */
class Product extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'product_master';
    public $timestamps = false;

    public function standard() {
        return $this->belongsTo(Standard::class, 'standard_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function books() {
        return $this->belongsToMany(Book::class, 'product_books', 'product_id', 'book_id')->withPivot('quantity');
    }

    public function getPriceAttribute() {
        $totalmrp = 0;
        foreach ($this->books as $book):
            $totalmrp+=$book->price_after_tax;
        endforeach;
        $shippingtax = (($this->instate_shipping_charges * 18) / 100);
        return $shippingtax+$this->instate_shipping_charges+$totalmrp;
    }
    
    public function order() {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
    }

}
