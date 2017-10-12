<?php

namespace App\Repositories\Product;

use App\Exceptions\Validation\ValidationException;
use App\Models\Product;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class ProductRepository.
 *
 */
class ProductRepository extends RepositoryAbstract implements ProductInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $product;

    /**
     * @var array
     */
    protected static $rules = [
        'title' => 'required|min:3|unique:product_master',
    ];

    /**
     * @param Product $product
     */
    public function __construct(Product $product) {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->product->orderBy('title', 'asc')->get();
    }

    /**
     * @param $page
     * @param $limit
     * @param $all
     *
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false) {
        $result = new \StdClass();
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = [];

        $query = $this->product->orderBy('title');

        $product = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalProduct();
        $result->items = $product->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->product->lists('title', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->product->findOrFail($id);
    }


    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes)) {
            
            
            $product=$this->product->fill($attributes)->save();
//            if($attributes['standard_id']){
//                $this->product->standard()->attach($attributes['standard_id']);
//            }
//            if($attributes['company_id']){
//                $this->product->company()->attach($attributes['company_id']);
//            }
            return true;

            //Event::fire('product.creating', $this->product);
        }

        throw new ValidationException('Product validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $rules = ['title' => 'required|min:3|unique:product_master,title,' . $id];
        $this->product = $this->find($id);

        if ($this->isValid($attributes, $rules)) {
          
            if (!isset($attributes['is_taxable'])) {
                $attributes['is_taxable']=0;;
            }
          
            $this->product->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Product validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->product = $this->product->find($id);
        $this->product->delete();
    }

    /**
     * @return mixed
     */
    protected function totalProduct() {
        return $this->product->count();
    }

}
