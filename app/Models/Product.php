<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
            $totalmrp += $book->price_after_tax;
        endforeach;

        $student_state = getUserShippingState();
        $company_state = \App\Models\Company::find($this->company_id)->state;
        if (empty($student_state)) {
            $student_state = $company_state;
        }
        if ($company_state == $student_state) {
            $state_ship = 'instate_shipping_charges';
        } else {
            $state_ship = 'outstate_shipping_charges';
        }

        $shippingtax = (($this->$state_ship * getProductItemHighestTax($this->id)) / 100);
        $total = numberWithDecimal($shippingtax + $this->$state_ship + $totalmrp);
        return $total;
    }

    function getShippingStateAttribute() {
        $student_state = getUserShippingState();
        $company_state = \App\Models\Company::find($this->company_id)->state;
        if (empty($student_state)) {
            $student_state = $company_state;
        }
        if ($company_state == $student_state) {
            $state_ship = 'instate_shipping_charges';
        } else {
            $state_ship = 'outstate_shipping_charges';
        }
        return $this->$state_ship;
    }

    public function order() {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
    }

    public function scopeActive($query) {
        $query->where(function ($query) {
            $query->where('status', '1');
        });
        return $query;
    }
    
    public function getIsTaxableFormattedAttribute() {
        return ($this->is_taxable == 1 ? 'Yes' : 'No');
    }
    
    public function getProductItemHighestTax($product_id) {
        if(!$product_id){
            return 0;
        }
        $data = Product::join('product_books', 'product_books.product_id', '=', 'product_master.id')
                 ->join('book_master', 'book_master.id', '=', 'product_books.book_id')
                 ->select(DB::raw('max(book_master.tax) as highest_tax'));
        $data = $data->where('product_master.id','=',$product_id);
        $data = $data->where('book_master.deleted_at','=',NULL);
        $data = $data->get();
        $highest_tax = $data[0]->highest_tax;
        $highest_tax = (float)$highest_tax;
        return $highest_tax;
    }
}
