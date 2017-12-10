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
    private $order_start;
    protected $fillable = ['user_id', 'status', 'amount', 'tax', 'shipping', 'total_amount', 'status_id', 'added_by', 'updated_by', 'preferred_delivery_date', 'shipping',
                'total_amount',
                'status_id',
                'preferred_delivery_date',
                'billing_address1',
                'billing_address2',
                'billing_area',
                'billing_city',
                'billing_state',
                'billing_zip',
                'shipping_address1',
                'shipping_address2',
                'shipping_area',
                'shipping_city',
                'shipping_state',
                'shipping_zip'];
    public static $rules = [
        'name' => 'required|min:3|unique:order_master,name,3',
        'description' => 'required',
        'status' => 'required',
        'school_id' => 'required',
    ];
    function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->order_start=config('order.order_start');
    }
    public function product() {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('qty','title','description','id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function getOrderDateFormattedAttribute() {
        return date('d F Y', strtotime($this->order_date));
    }
    
    public function getOrderDateFormattedShortAttribute() {
        return date('d-M-y', strtotime($this->order_date));
    }
    
    public function getPreferredDeliveryDateFormattedAttribute() {
        if($this->preferred_delivery_date && $this->preferred_delivery_date != '0000-00-00'){
            return date('d F Y', strtotime($this->preferred_delivery_date));
        }else{
            return 'Not provided';
        }
    }
    public function getPreferredDeliveryDateFormattedShortAttribute() {
        if($this->preferred_delivery_date && $this->preferred_delivery_date != '0000-00-00'){
            return date('d-M-y', strtotime($this->preferred_delivery_date));
        }else{
            return 'Not provided';
        }
    }

    public function getOrderNoAttribute() {
        return $this->id + $this->order_start;
    }

    public function getOrderStatusTextAttribute() {
        return $this->status()->find($this->status_id)->name;
    }

}
