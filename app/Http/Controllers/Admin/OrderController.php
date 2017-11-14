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
use Illuminate\Http\Request;

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
    public function index(Request $request) {
        $product_id = '';
//        $pagiData = $this->order->paginate(Input::get('page', 1), $this->perPage, true);
//        $orders = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);
        $orders = \App\Models\Order::orderBy('order_date', 'desc');
        $order_id = '';
        if ($request->order_id) {
            $order_id = $request->order_id;
            $orders = $orders->where('id', '=', $order_id - config('order.order_start'));
        }
        $product_id = '';
        if ($request->product_id) {
            $product_id = $request->product_id;
            $orders = $orders->whereHas('product', function($query) use($product_id) {
                $query->where('product_id', $product_id);
            });
        }
        $status = '';
        //dd($request->is_taxable);
        if (($request->status)) {
            $status = $request->status;
            $orders = $orders->whereHas('status', function($query) use($status) {
                $query->where('status_id', $status);
            });
        }

        $search = '';
        if ($request->search) {
            $search = $request->search;
            $orders = $orders->whereHas('user', function($query) use($search) {
                $query->where(function ($usr) use($search) {
                    $usr->orWhere('first_name', 'like', '%' . $search . '%')
                            ->orWhere('last_name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->orWhere('mobile', 'like', '%' . $search . '%')
                            ->orWhere('landline', 'like', '%' . $search . '%');
                });
            });
        }

        $from = '';
        if ($request->from) {
            $from = $request->from;
            if ($request->to)
                $orders = $orders->whereDate('order_date', '>=', $from);
            else
                $orders = $orders->whereDate('order_date', '=', $from);
        }
        $to = '';
        if ($request->to) {
            $to = $request->to;
            if ($request->from)
                $orders = $orders->whereDate('order_date', '<=', $to);
            else
                $orders = $orders->whereDate('order_date', '=', $to);
        }
        $min = '';
        if ($request->min) {
            $min = $request->min;
            $orders = $orders->where('total_amount', '>=', $min);
        }
        $max = '';
        if ($request->max) {
            $max = $request->max;
            $orders = $orders->where('total_amount', '<=', $max);
        }
        $limit = $this->perPage;
        $offset = $request->page;
        if ($request->export) {
            $offset = $request->offset;
            return $this->export($orders, $request, $limit, $offset);
        }
        if ($request->export_all) {
            return $this->export($orders, $request);
        }
        if ($request->delete && $request->export_order) {
            $this->delete($orders, $request->export_order);
            Flash::message('Order successfully deleted');
            return Redirect::route('admin.order');
        }

        $orders = $orders->paginate($this->perPage);
        if ($order_id) {
            $orders = $orders->appends(['order_id' => $order_id]);
        }
        if ($product_id) {
            $orders = $orders->appends(['product_id' => $product_id]);
        }
        if ($search) {
            $orders = $orders->appends(['search' => $search]);
        }
        if ($status) {
            $orders = $orders->appends(['status' => $status]);
        }

        if ($from) {
            $orders = $orders->appends(['from' => $from]);
        }
        if ($to) {
            $orders = $orders->appends(['to' => $to]);
        }
        if ($min) {
            $orders = $orders->appends(['min' => $min]);
        }
        if ($max) {
            $orders = $orders->appends(['max' => $max]);
        }

        $product = \App\Models\Product::lists('title', 'id')->toArray();
        $product = [null => 'ALL'] + $product;
        $statuss = \App\Models\Status::lists('name', 'id')->toArray();
        $statuss = [null => 'ALL'] + $statuss;
        return view('backend.order.index', compact('orders', 'min', 'max', 'from', 'to', 'search', 'order_id', 'product', 'product_id', 'status', 'statuss'));
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
            $order = \App\Models\Order::find($id);
            //dd($order->user->first_name);
            $data['name'] = $order->user->first_name;
            $data['email'] = $order->user->email;
            $data['order_no'] = $order->order_no;
            $data['status'] = \App\Models\Status::find($data['status_id']);
            $data['status'] = $data['status']->name;

            $template = \App\Models\Email::where(['template' => 'Order Status'])->get();
            // Send the welcome email
            if ($template) {
                $body = str_replace('<<parent_name>>', $order->user->parent_first_name . ' ' . $order->user->parent_last_name, $template[0]->body);
                $body = str_replace('<<order_no>>', $order->order_no, $body);
                $body = str_replace('<<status>>', $data['status'], $body);

                $body = nl2br($body);
                Mail::send('emails.orderstatus', ['body' => $body], function ($m) use ($data,$template) {
                    $m->from('noreply@jeevandeep.com', 'Jeevandeep');
                    $m->to($data['email'], $data['name']);
                    $m->subject($template[0]->subject);
                });
            }
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

    private function export($orders, $request = NULL, $limit = NULL, $offset = NULL) {
        $ids = @$request->export_order;
        if ($ids) {
            $orders = $orders->whereIn('id', explode(',', $ids));
        } else
        if ($limit) {

            if ($offset) {
                $orders = $orders->offset(($offset - 1) * $limit);
            }
            $orders = $orders->limit($limit);
        }
        $orders = $orders->get();
        $search = @$request->search;
        $from = @$request->from;
        $to = @$request->to;
        $min = @$request->min;
        $max = @$request->max;
        $product = @$request->product;
        // return view('backend.orders.export', compact('orders', 'search', 'order_id', 'product', 'product_id', 'status', 'statuss'));
        $pdf = PDF::loadView('backend.orders.export', compact('orders', 'search', 'from', 'to', 'min', 'max', 'product'));
        return $pdf->stream();
    }

    private function delete($orders, $ids) {
        if ($ids) {
            $orders = $orders->whereIn('id', explode(',', $ids));
            $orders->delete();
        }
    }

}
