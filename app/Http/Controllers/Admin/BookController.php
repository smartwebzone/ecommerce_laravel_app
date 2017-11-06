<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Book\BookInterface;
use App\Repositories\Book\BookRepository as Book;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;
use Excel;
use Config;

/**
 * Class BookController.
 *

 */
class BookController extends Controller {

    protected $book;
    protected $perPage;

    public function __construct(BookInterface $book) {
        $this->book = $book;
        View::share('active', 'blog');
        $this->perPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->book->paginate(Input::get('page', 1), $this->perPage, true);
        $book = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $company = \App\Models\Company::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.create', compact('company', 'standard'));
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
            if (isset($data['is_taxable']) && $data['is_taxable'] == 1) {
                
            } else {
                $data['is_taxable'] = 0;
                $data['tax'] = 0;
            }
            $data['price_after_tax'] = calculatePercentage($data['price'], $data['tax']);
            $this->book->create($data);
            Flash::message('Book was successfully added');

            return Redirect::route('admin.book');
        } catch (ValidationException $e) {
            return Redirect::route('admin.book.create')->withInput()->withErrors($e->getErrors());
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
        $book = $this->book->find($id);

        return view('backend.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $book = $this->book->find($id);
        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $company = \App\Models\Company::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.edit', compact('book', 'standard', 'company'));
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
            if (isset($data['is_taxable']) && $data['is_taxable'] == 1) {
                
            } else {
                $data['is_taxable'] = 0;
                $data['tax'] = 0;
            }
            $data['price_after_tax'] = calculatePercentage($data['price'], $data['tax']);
            $this->book->update($id, $data);
            Flash::message('Book was successfully updated');

            return Redirect::route('admin.book');
        } catch (ValidationException $e) {
            return Redirect::route('admin.book.edit', ['id' => $id])->withInput()->withErrors($e->getErrors());
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
        $this->book->delete($id);
        Flash::message('Book was successfully deleted');

        return Redirect::route('admin.book');
    }

    public function confirmDestroy($id) {
        $book = $this->book->find($id);

        return view('backend.book.confirm-destroy', compact('book'));
    }

    public function copy($id) {
        $book = $this->book->find($id);
        $newBook = $book->replicate();
        $newBook->save();
        $newBook->name = 'Copy of ' . $book->name;
        $newBook->save();
        Flash::message('Clone successfully generated');

        return Redirect::route('admin.book');
    }

    public function import() {
        $data = Input::all();
        $data['added_by'] = Sentinel::getUser()->id;
        $data['total_book']=0;
        //Config::set('excel.import.startRow', 9);
        $reader = Excel::load($data['upload'])->ignoreEmpty();
        $reader->each(function($sheet) use(&$data) {
            $sheet->each(function($row) use(&$data) {
                $standard=\App\Models\Standard::where(['name'=>$row->class])->first();
                if ($row->title && $standard) {
                    $data['total_book']++;
                    $book = array('name' => $row->title,
                        'standard_id' => $standard->id,
                        'medium' => $row->medium,
                        'company_id' => $data['company_id'],
                        'book_code' => $row->code,
                        'description' => ($row->description) ? $row->description : $row->title,
                        'author' => ($row->author) ? $row->author : $row->title,
                        'shipping_charges' => ($row->shipping) ? $row->shipping : 0,
                        'price' => $row->rate,
                        'tax' => $row->tax,
                        'quantity' => $row->qty,
                        'is_taxable' => ($row->tax) ? 1 : 0,
                        'price_after_tax' => calculatePercentage($row->rate, $row->tax),
                    );
                    \App\Models\Book::create($book);
                }
            });
        });

        Flash::message('Total '.$data['total_book'].' Books was successfully uploaded');

        return Redirect::route('admin.book');
    }

    public function upload() {

        $standard = \App\Models\Standard::lists('name', 'id')->toArray();
        $standard = [null => 'Please Select'] + $standard;

        $company = \App\Models\Company::lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.upload', compact('standard', 'company'));
    }

}
