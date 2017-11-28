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
use Illuminate\Http\Request;

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
        $this->perPage = 50;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        // $pagiData = $this->book->paginate(Input::get('page', 1), $this->perPage, true);
        //$book = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);
        $book = \App\Models\Book::orderBy('created_at', 'desc');
        $company_id = '';
        if ($request->company_id) {
            $company_id = $request->company_id;
            $book = $book->where('company_id', '=', $company_id);
        }
        $is_taxable = '';
        //dd($request->is_taxable);
        if (($request->is_taxable)) {
            $is_taxabl = ($request->is_taxable==2) ? 1 : 0;
            $is_taxable = $request->is_taxable;
            $book = $book->where('is_taxable', '=', $is_taxabl);
        }

        $search = '';
        if ($request->search) {
            $search = $request->search;
            $book->where(function ($usr) use($search) {
                $usr->where('name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('book_code', 'like', '%' . $search . '%');
            });
        }
        if ($request->delete && $request->delete_book) {
            $this->delete($book, $request->delete_book);
            Flash::message('Book successfully deleted');
            return Redirect::route('admin.book');
        }
        $book = $book->paginate($this->perPage);
        if ($company_id) {
            $book = $book->appends(['company_id' => $company_id]);
        }
        if ($search) {
            $book = $book->appends(['search' => $search]);
        }
        if ($is_taxable) {
            $book = $book->appends(['is_taxable' => $is_taxable]);
        }
        $company = \App\Models\Company::orderBy('name', 'asc')->lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.index', compact('book', 'company','search', 'company_id','is_taxable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $company = \App\Models\Company::orderBy('name', 'asc')->lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.create', compact('company'));
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
            $data['price'] = calculateBasePrice($data['price_after_tax'], $data['tax']);
            $this->book->create($data);
            Flash::message('Item was successfully added');

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
        $company = \App\Models\Company::orderBy('name', 'asc')->lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.edit', compact('book', 'company'));
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
            $data['price'] = calculateBasePrice($data['price_after_tax'], $data['tax']);
            $this->book->update($id, $data);
            Flash::message('Item was successfully updated');

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
        Flash::message('Item was successfully deleted');

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
        $newBook->book_code = 'Copy of ' . $book->book_code;
        $newBook->save();
        Flash::message('Clone successfully generated');

        return Redirect::route('admin.book');
    }

    public function import() {
        error_reporting(0);
        $data = Input::all();
        $data['added_by'] = Sentinel::getUser()->id;
        $data['total_book'] = 0;
        //Config::set('excel.import.startRow', 9);
        $reader = Excel::load($data['upload'])->ignoreEmpty();
        $reader->each(function($sheet) use(&$data) {
            $sheet->each(function($row) use(&$data) {
                if ($row->title) {
                    $check_duplicate = \App\Models\Book::where(['name'=>$row->title,'company_id'=>$data['company_id']])->first();
                    $check_duplicate1 = \App\Models\Book::where(['book_code'=>$row->code,'price_after_tax'=>$row->rate,'deleted_at'=>NULL])->first();
                    if(!$check_duplicate && !$check_duplicate1){
                        $data['total_book'] ++;
                        if($row->tax > 0){
                            $row->tax = $row->tax * 100;
                        }
                        $book = array('name' => $row->title,
                            'medium' => $row->medium,
                            'company_id' => $data['company_id'],
                            'book_code' => $row->code,
                            'description' => ($row->description) ? $row->description : $row->title,
                            'author' => ($row->author) ? $row->author : $row->title,
                            'hsn_code' => $row->hsn_code,
                            'weight' => $row->weight,
                            'price' => calculateBasePrice($row->rate, $row->tax),
                            'tax' => $row->tax,
                            'quantity' => $row->qty,
                            'is_taxable' => ($row->tax) ? 1 : 0,
                            'price_after_tax' => $row->rate
                        );
                        \App\Models\Book::create($book);
                    }
                }
            });
        });

        Flash::message('Total ' . $data['total_book'] . ' items was successfully uploaded');

        return Redirect::route('admin.book');
    }

    public function upload() {
        $company = \App\Models\Company::orderBy('name', 'asc')->lists('name', 'id')->toArray();
        $company = [null => 'Please Select'] + $company;
        return view('backend.book.upload', compact('company'));
    }
    private function delete($books, $ids) {
        if ($ids) {
            $books = $books->whereIn('id', explode(',', $ids));
            $books->delete();
        }
    }

}
