<?php

namespace App\Models;

use App\Interfaces\ModelInterface as ModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductBooks.
 *
 */
class ProductBooks extends Model implements ModelInterface {


    public $table = 'product_books';
    public $timestamps = false;
    protected $fillable = ['product_id', 'book_id','quantity'];

    

}
