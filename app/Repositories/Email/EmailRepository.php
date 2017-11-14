<?php

namespace App\Repositories\Email;

use App\Exceptions\Validation\ValidationException;
use App\Models\Email;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class EmailRepository.
 *
 */
class EmailRepository extends RepositoryAbstract implements EmailInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $email;

    /**
     * @var array
     */
    protected static $rules = [
        'name' => 'required',
        'subject' => 'required',
        'body' => 'required',
    ];

    /**
     * @param Email $email
     */
    public function __construct(Email $email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->email->orderBy('name', 'asc')->get();
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

        $query = $this->email->orderBy('name');

        $email = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalEmail();
        $result->items = $email->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->email->lists('name', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->email->findOrFail($id);
    }


    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status']=0;
            }
            $email=$this->email->fill($attributes)->save();
            return true;

            //Event::fire('email.creating', $this->email);
        }

        throw new ValidationException('Email validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $this->email = $this->find($id);

        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status']=0;
            }
            $this->email->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Email validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->email = $this->email->find($id);
        $this->email->delete();
    }

    /**
     * @return mixed
     */
    protected function totalEmail() {
        return $this->email->count();
    }

}
