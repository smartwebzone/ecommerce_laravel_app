<?php

namespace App\Repositories\Standard;

use App\Exceptions\Validation\ValidationException;
use App\Models\Standard;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class StandardRepository.
 *
 */
class StandardRepository extends RepositoryAbstract implements StandardInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $standard;

    /**
     * @var array
     */
    protected static $rules = [
        'name' => 'required'
    ];

    /**
     * @param Standard $standard
     */
    public function __construct(Standard $standard) {
        $this->standard = $standard;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->standard->orderBy('name', 'asc')->get();
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

        $query = $this->standard->orderBy('name');

        $standard = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalStandard();
        $result->items = $standard->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->standard->lists('name', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->standard->findOrFail($id);
    }

    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status'] = 0;
            }
            $this->standard->fill($attributes)->save();

            return true;

            //Event::fire('standard.creating', $this->standard);
        }

        throw new ValidationException('Standard validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $this->standard = $this->find($id);

        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status'] = 0;
            }

            $this->standard->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Standard validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->standard = $this->standard->find($id);
        $this->standard->delete();
    }

    /**
     * @return mixed
     */
    protected function totalStandard() {
        return $this->standard->count();
    }

}
