<?php

namespace App\Repositories\Book;

use App\Exceptions\Validation\ValidationException;
use App\Models\Book;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class BookRepository.
 *
 */
class BookRepository extends RepositoryAbstract implements BookInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $book;

    /**
     * @var array
     */
    protected static $rules = [
        'company_id' => 'required',
        'standard_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'author' => 'required',
        'book_code' => 'required',
        'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
        'tax' => 'regex:/^\d*(\.\d{1,2})?$/',
        'shipping_charges' => 'regex:/^\d*(\.\d{1,2})?$/'
    ];

    /**
     * @param Book $book
     */
    public function __construct(Book $book) {
        $this->book = $book;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->book->orderBy('name', 'asc')->get();
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

        $query = $this->book->orderBy('name');

        $book = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalBook();
        $result->items = $book->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->book->lists('name', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->book->findOrFail($id);
    }

    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status'] = 0;
            }
            if (!isset($attributes['is_taxable'])) {
                $attributes['is_taxable'] = 0;
            }
            $book = $this->book->fill($attributes)->save();
            return true;

            //Event::fire('book.creating', $this->book);
        }

        throw new ValidationException('Book validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $this->book = $this->find($id);

        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status'] = 0;
            }
            if (!isset($attributes['is_taxable'])) {
                $attributes['is_taxable'] = 0;
            }

            $this->book->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Book validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->book = $this->book->find($id);
        $this->book->delete();
    }

    /**
     * @return mixed
     */
    protected function totalBook() {
        return $this->book->count();
    }

}
