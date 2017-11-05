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
     protected $fillable = ['user_id','status','amount','tax' ,'shipping' ,'total_amount','status_id' , 'added_by','updated_by','preferred_delivery_date'];
     
     public static $rules = [
        'name' => 'required|min:3|unique:order_master,name,3',
        'description' => 'required',
        'status' => 'required',
        'school_id' => 'required',
    ];
    public function product() {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }
    public function getOrderDateFormattedAttribute(){
        return date('d F Y',strtotime($this->order_date));
    }
    public function getOrderStatusTextAttribute(){
        return $this->status()->find($this->status_id)->name;
    }
}
