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

/**
 * Class BookController.
 *
 * @author Phillip Madsen <contact@affordableprogrammer.com>
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
         $standard = \App\Models\Standard::lists('name','id')->toArray();
         $standard = [null=>'Please Select'] + $standard;
         
         $company = \App\Models\School::lists('name','id')->toArray();
         $company = [null=>'Please Select'] + $company;
        return view('backend.book.create', compact('company','standard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        try {
            $data=Input::all();
            $data['added_by']=  Sentinel::getUser()->id;
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
         $standard = \App\Models\Standard::lists('name','id')->toArray();
         $standard = [null=>'Please Select'] + $standard;
         
         $company = \App\Models\School::lists('name','id')->toArray();
         $company = [null=>'Please Select'] + $company;
        return view('backend.book.edit', compact('book','standard','company'));
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
            $data['updated_by']=  Sentinel::getUser()->id;
            $this->book->update($id, $data);
            Flash::message('Book was successfully updated');

            return Redirect::route('admin.book');
        } catch (ValidationException $e) {
            return Redirect::route('admin.book.edit',['id'=>$id])->withInput()->withErrors($e->getErrors());
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

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $book = $this->book->find($id);

        return view('backend.book.confirm-destroy', compact('book'));
    }

}
