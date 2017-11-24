<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Company\CompanyInterface;
use App\Repositories\Company\CompanyRepository as Company;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;

/**
 * Class CompanyController.
 *
 
 */
class CompanyController extends Controller {

    protected $company;
    protected $perPage;

    public function __construct(CompanyInterface $company) {
        $this->company = $company;
        View::share('active', 'blog');
        $this->perPage = 50;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->company->paginate(Input::get('page', 1), $this->perPage, true);
        $company = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
         $state = \App\Models\State::orderBy('name', 'asc')->lists('name','name')->toArray();
         $state = [null=>'Please Select'] + $state;
        return view('backend.company.create', compact('state'));
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
            $this->company->create($data);
            Flash::message('Company was successfully added');

            return Redirect::route('admin.company');
        } catch (ValidationException $e) {
            return Redirect::route('admin.company.create')->withInput()->withErrors($e->getErrors());
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
        $company = $this->company->find($id);

        return view('backend.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $company = $this->company->find($id);
        $state = \App\Models\State::orderBy('name', 'asc')->lists('name','name')->toArray();
        $state = [null=>'Please Select'] + $state;
        return view('backend.company.edit', compact('company','state'));
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
            $this->company->update($id, $data);
            Flash::message('Company was successfully updated');

            return Redirect::route('admin.company');
        } catch (ValidationException $e) {
            return Redirect::route('admin.company.edit',['id'=>$id])->withInput()->withErrors($e->getErrors());
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
        $this->company->delete($id);
        Flash::message('Company was successfully deleted');

        return Redirect::route('admin.company');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $company = $this->company->find($id);

        return view('backend.company.confirm-destroy', compact('company'));
    }

}
