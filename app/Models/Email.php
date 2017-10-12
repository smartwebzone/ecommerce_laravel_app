<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Email.
 *
 */
class Email extends Model implements ModelInterface {

    use SoftDeletes;

    protected $guarded = ['id'];
    public $table = 'email_templates';
    public $timestamps = false;
     protected $fillable = ['name', 'description', 'author', 'email_code', 'price','tax', 'is_taxable', 'last_name', 'price_after_tax', 'shipping_charges', 'referral_id', 'status', 'added_by','updated_by'];
     
     public static $rules = [
        'name' => 'required|min:3|unique:email_master,name,3',
        'description' => 'required',
        'status' => 'required',
        'school_id' => 'required',
    ];
    public function standard() {
        return $this->belongsToMany(Standard::class, 'email_standard', 'email_id', 'standard_id');
    }
    public function company() {
        return $this->belongsToMany(Company::class, 'email_company', 'email_id', 'company_id');
    }


}
