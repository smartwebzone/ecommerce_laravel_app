<?php

namespace App\Repositories\School;

use App\Exceptions\Validation\ValidationException;
use App\Models\School;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class SchoolRepository.
 *
 */
class SchoolRepository extends RepositoryAbstract implements SchoolInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $school;

    /**
     * @var array
     */
    protected static $rules = [
        'name' => 'required|min:3|unique:school_master',
    ];

    /**
     * @param School $school
     */
    public function __construct(School $school) {
        $this->school = $school;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->school->where('lang', $this->getLang())->orderBy('name', 'asc')->get();
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

        $query = $this->school->orderBy('name');

        $school = $query->skip($limit * ($page - 1))->take($limit)->where('lang', $this->getLang())->get();

        $result->totalItems = $this->totalSchool();
        $result->items = $school->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->school->where('lang', $this->getLang())->lists('name', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->school->findOrFail($id);
    }


    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes)) {


            $this->school->lang = $this->getLang();

            $this->school->fill($attributes)->save();

            return true;

            //Event::fire('school.creating', $this->school);
        }

        throw new ValidationException('School validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $rules = ['name' => 'required|min:3|unique:school_master,name,' . $id];
        $this->school = $this->find($id);

        if ($this->isValid($attributes, $rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status']=0;;
            }
          
            $this->school->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('School validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->school = $this->school->find($id);
        $this->school->delete();
    }

    /**
     * @return mixed
     */
    protected function totalSchool() {
        return $this->school->where('lang', $this->getLang())->count();
    }

}
