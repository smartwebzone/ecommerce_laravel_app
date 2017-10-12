<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order.
 *
 */
class Order extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'order_master';
    public $timestamps = false;
     protected $fillable = ['name', 'description', 'author', 'order_code', 'price','tax', 'is_taxable', 'last_name', 'price_after_tax', 'shipping_charges', 'referral_id', 'status', 'added_by','updated_by'];
     
     public static $rules = [
        'name' => 'required|min:3|unique:order_master,name,3',
        'description' => 'required',
        'status' => 'required',
        'school_id' => 'required',
    ];
    public function standard() {
        return $this->belongsToMany(Standard::class, 'order_standard', 'order_id', 'standard_id');
    }
    public function company() {
        return $this->belongsToMany(Company::class, 'order_company', 'order_id', 'company_id');
    }


}
