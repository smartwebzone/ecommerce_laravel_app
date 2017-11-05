<?php
namespace App\Repositories\Order;

use App\Exceptions\Validation\ValidationException;
use App\Models\Order;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class OrderRepository.
 *
 */
class OrderRepository extends RepositoryAbstract implements OrderInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $order;

    /**
     * @var array
     */
    protected static $rules = [
        'transaction_id' => 'required|min:3|unique:order_master',
    ];

    /**
     * @param Order $order
     */
    public function __construct(Order $order) {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->order->orderBy('transaction_id', 'asc')->get();
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

        $query = $this->order->orderBy('transaction_id');

        $order = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalOrder();
        $result->items = $order->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->order->lists('transaction_id', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->order->findOrFail($id);
    }


    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes)) {
            
            
            $order=$this->order->fill($attributes)->save();
            if($attributes['standard_id']){
                $this->order->standard()->attach($attributes['standard_id']);
            }
            if($attributes['company_id']){
                $this->order->company()->attach($attributes['company_id']);
            }
            return true;

            //Event::fire('order.creating', $this->order);
        }

        throw new ValidationException('Order validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $rules = ['transaction_id' => 'required|min:3|unique:order_master,transaction_id,' . $id];
        $this->order = $this->find($id);

      //  if ($this->isValid($attributes, $rules)) 
                {
            if (!isset($attributes['status_id'])) {
                $attributes['status_id']=0;;
            }
            if (!isset($attributes['is_taxable'])) {
                $attributes['is_taxable']=0;;
            }
          
            $this->order->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Order validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->order = $this->order->find($id);
        $this->order->delete();
    }

    /**
     * @return mixed
     */
    protected function totalOrder() {
        return $this->order->count();
    }

}
