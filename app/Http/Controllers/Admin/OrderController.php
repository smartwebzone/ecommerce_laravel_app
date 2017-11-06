<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Order\OrderRepository as Order;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Mail;
use PDF;
use Redirect;
use Sentinel;

/**
 * Class OrderController.
 *

 */
class OrderController extends Controller {

    protected $order;
    protected $perPage;

    public function __construct(OrderInterface $order) {
        $this->order = $order;
        View::share('active', 'blog');
        $this->perPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->order->paginate(Input::get('page', 1), $this->perPage, true);
        $order = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $company = \App\Models\School::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.order.create', compact('company', 'standard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        try {
            $data = Input::all();
            $data['added_by'] = Sentinel::getUser()->id;
            $this->order->create($data);
            Flash::message('Order was successfully added');

            return Redirect::route('admin.order');
        } catch (ValidationException $e) {
            return Redirect::route('admin.order.create')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id) {
        $order = $this->order->find($id);
        $status = \App\Models\Status::lists('name', 'id')->toArray();
        return view('backend.order.show', compact('order', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $order = $this->order->find($id);
        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $company = \App\Models\School::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.order.edit', compact('order', 'standard', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id) {
        try {
            $data = Input::all();

            $data['updated_by'] = Sentinel::getUser()->id;
            $this->order->update($id, $data);
            $order=  \App\Models\Order::find($id);
            //dd($order->user->first_name);
            $data['name']=$order->user->first_name;
            $data['email']=$order->user->email;
            $data['order_no']=$order->order_no;
            $data['status']=  \App\Models\Status::find($data['status_id']);
            $data['status']=$data['status']->name;
            Mail::send('emails.orderstatus', $data, function ($m) use ($data) {
                $m->from('noreply@jeevandeep.com', 'Jeevandeep');
                $m->to($data['email'], $data['name']);
                $m->subject('Welcome to Jeevandeep');
            });
            Flash::message('Order was successfully updated');

            return Redirect::route('admin.order.show', ['id' => $id]);
        } catch (ValidationException $e) {
            return Redirect::route('admin.order.show', ['id' => $id])->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $this->order->delete($id);
        Flash::message('Order was successfully deleted');

        return Redirect::route('admin.order');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $order = $this->order->find($id);

        return view('backend.order.confirm-destroy', compact('order'));
    }
    public function invoice($id) {
        
        $order = \App\Models\Order::find($id);
        $option_added = [];    
        //dd($order->user);
        //return view('backend.orders.invoice', compact('orderDetails', 'order', 'options'));
        $pdf = PDF::loadView('backend.orders.invoice', compact('orderDetails', 'order', 'options'));
        return $pdf->stream();
    }
    
}
