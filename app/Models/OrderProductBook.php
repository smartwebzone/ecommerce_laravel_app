<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order.
 *
 */
class OrderProductBook extends Model implements ModelInterface {

    protected $guarded = ['id'];
    public $table = 'order_product_book';
    public $timestamps = false;

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
