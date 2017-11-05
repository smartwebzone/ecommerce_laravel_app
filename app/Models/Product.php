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
        return $this->belongsToMany(Book::class, 'product_books', 'product_id', 'book_id');
    }

    public function getPriceAttribute() {
        $totalmrp = 0;
        foreach ($this->books as $book):
            $totalmrp+=$book->price_after_tax;
        endforeach;
        
        $student_state = getUserShippingState();
        $school_state = \App\Models\School::find($this->school_id)->state;
        if(empty($student_state)){
            $student_state = $school_state;
        }
        if($school_state == $student_state){
            $state_ship = 'instate_shipping_charges';
        }else{
            $state_ship = 'outstate_shipping_charges';
        }
        
        $shippingtax = (($this->$state_ship * 18) / 100);
        $total = numberWithDecimal($shippingtax+$this->$state_ship+$totalmrp);
        return $total;
    }
    
    function getShippingStateAttribute(){
        $student_state = getUserShippingState();
        $school_state = \App\Models\School::find($this->school_id)->state;
        if(empty($student_state)){
            $student_state = $school_state;
        }
        if($school_state == $student_state){
            $state_ship = 'instate_shipping_charges';
        }else{
            $state_ship = 'outstate_shipping_charges';
        }
        return $this->$state_ship;
    }
    
    public function order() {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
    }

}
