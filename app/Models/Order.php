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
     protected $fillable = ['user_id','status','amount','tax' ,'shipping' ,'total_amount','status_id' , 'added_by','updated_by'];
     
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
    public function product() {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }


}
