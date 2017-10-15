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

}
