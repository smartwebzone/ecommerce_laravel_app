<?php

namespace App\Repositories\Company;

use App\Exceptions\Validation\ValidationException;
use App\Models\Company;
use App\Models\Section;
use App\Repositories\CrudableInterface;
use App\Repositories\RepositoryAbstract;
use Config;
use Event;
use File;
use Image;

/**
 * Class CompanyRepository.
 *
 */
class CompanyRepository extends RepositoryAbstract implements CompanyInterface, CrudableInterface {

    /**
     * @var mixed
     */
    protected $width;
    protected $height;
    protected $thumbWidth;
    protected $thumbHeight;

    /**
     * @var mixed
     */
    protected $imgDir;

    /**
     * @var mixed
     */
    protected $perPage;

    /**
     * @var mixed
     */
    protected $company;

    /**
     * @var array
     */
    protected static $rules = [
        'name' => 'required|unique:company_master,name,NULL,id,deleted_at,NULL',
        'phone' => 'required',
        'email' => 'required|email',
        'contact_person' => 'required',
        'address1' => 'required',
        'area' => 'required',
        'city' => 'required',
        'state' => 'required',
        'zip' => 'required|digits:6'
    ];

    /**
     * @param Company $company
     */
    public function __construct(Company $company) {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function all() {
        return $this->company->orderBy('name', 'asc')->get();
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

        $query = $this->company->orderBy('name');

        $company = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalCompany();
        $result->items = $company->all();

        return $result;
    }

    /**
     * @return mixed
     */
    public function lists() {
        return $this->company->lists('name', 'id');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id) {
        return $this->company->findOrFail($id);
    }

    /**
     * @TODO CHECK FUNCTIONALITY OF NEW UPLOADER AND SAVING OF NEW FIELDS
     */
    public function create($attributes) {
        if ($this->isValid($attributes, static::$rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status'] = 0;
            }
            $this->company->fill($attributes)->save();

            return true;

            //Event::fire('company.creating', $this->company);
        }

        throw new ValidationException('Company validation failed', $this->getErrors());
    }

    /**
     * @TODO ADD UPLOAD AND NEW VALIDATION TO UPDATE LIKE WAS ADDED TO STORE:
     */
    public function update($id, $attributes) {
        $this->company = $this->find($id);
        
        $rules = static::$rules;
        $rules['name'] = 'required|unique:company_master,name,'.$id.',id,deleted_at,NULL';
        
        if ($this->isValid($attributes, $rules)) {
            if (!isset($attributes['status'])) {
                $attributes['status'] = 0;
            }

            $this->company->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Company validation failed', $this->getErrors());
    }

    /**
     * @param $id
     */
    public function delete($id) {
        $this->company = $this->company->find($id);
        $this->company->delete();
    }

    /**
     * @return mixed
     */
    protected function totalCompany() {
        return $this->company->count();
    }

}
