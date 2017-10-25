<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Product\ProductInterface;
use App\Repositories\Product\ProductRepository as Product;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;

/**
 * Class ProductController.
 *

 */
class ProductController extends Controller {

    protected $product;
    protected $perPage;

    public function __construct(ProductInterface $product) {
        $this->product = $product;
        View::share('active', 'blog');
        $this->perPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->product->paginate(Input::get('page', 1), $this->perPage, true);
        $product = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.product.index', compact('product'));
    }

    public function book($id) {
        $product = $this->product->find($id);
        $book = \App\Models\Book::lists('name', 'id')->toArray();
        $book = [null => 'Please Select'] + $book;
        return view('backend.product.book', compact('product', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $school = \App\Models\School::lists('name', 'id')->toArray();
        $school = [null => 'Please Select'] + $school;

        $company = \App\Models\Company::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.product.create', compact('company', 'standard', 'school'));
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
            $product = $this->product->create($data);

            Flash::message('Product was successfully added');
            return Redirect::route('admin.product.book', ['id' => $product->id]);
        } catch (ValidationException $e) {
            return Redirect::route('admin.product.create')->withInput()->withErrors($e->getErrors());
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
        $product = $this->product->find($id);

        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $product = $this->product->find($id);
        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $company = \App\Models\Company::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.product.edit', compact('product', 'standard', 'company'));
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
            $this->product->update($id, $data);
            Flash::message('Product was successfully updated');

            return Redirect::route('admin.product');
        } catch (ValidationException $e) {
            return Redirect::route('admin.product.edit', ['id' => $id])->withInput()->withErrors($e->getErrors());
        }
    }

    public function book_update($id) {
        try {
            $data = Input::all();
            $array = array();
            foreach ($data['book_id'] as $i => $bid) {
                if (!in_array($bid, $array)) {
                    $array[] = $bid;
                    \App\Models\ProductBooks::create(['book_id' => $bid, 'quantity' => $data['quantity'][$i], 'product_id' => $id]);
                }
            }
            Flash::message('Product was successfully updated');

            return Redirect::route('admin.product');
        } catch (ValidationException $e) {
            return Redirect::route('admin.product.book', ['id' => $id])->withInput()->withErrors($e->getErrors());
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
        $this->product->delete($id);
        Flash::message('Product was successfully deleted');

        return Redirect::route('admin.product');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $product = $this->product->find($id);

        return view('backend.product.confirm-destroy', compact('product'));
    }

    public function copy($id) {


        $product = $this->product->find($id);
        $newProduct = $product->replicate();
        $newProduct->save();
        $newProduct->title = 'Copy of ' . $product->title;
        $newProduct->save();

        $productb = \App\Models\ProductBooks::where(['product_id' => $id])->get();
        $array=array();
        foreach($productb as $i => $pb) {
            if (!in_array($pb->book_id, $array)) {
                $array[] = $pb->book_id;
                \App\Models\ProductBooks::create(['book_id' => $pb->book_id, 'quantity' => $pb->quantity, 'product_id' => $newProduct->id]);
            }
        }
        Flash::message('Clone successfully generated');

        return Redirect::route('admin.product');
    }

}
