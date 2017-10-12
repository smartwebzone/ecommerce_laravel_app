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
     protected $fillable = [ 'standard_id', 'company_id', 'title', 'description','long_description', 'is_taxable', 'instate_shipping_charges', 'outstate_shipping_charges', 'status', 'added_by','updated_by'];
     
     public static $rules = [
        'title' => 'required|min:3|unique:product_master,title,3',
        'description' => 'required',
        'status' => 'required',
        'school_id' => 'required',
    ];
//    public function standard() {
//        return $this->belongsToMany(Standard::class, 'product_standard', 'product_id', 'standard_id');
//    }
//    public function company() {
//        return $this->belongsToMany(Company::class, 'product_company', 'product_id', 'company_id');
//    }
    public function standard() {
        return $this->belongsTo(Standard::class,  'standard_id');
    }
    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }


}
