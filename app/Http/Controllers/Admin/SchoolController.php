<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\School\SchoolInterface;
use App\Repositories\School\SchoolRepository as School;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;

/**
 * Class SchoolController.
 *
 
 */
class SchoolController extends Controller {

    protected $school;
    protected $perPage;

    public function __construct(SchoolInterface $school) {
        $this->school = $school;
        View::share('active', 'blog');
        $this->perPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->school->paginate(Input::get('page', 1), $this->perPage, true);
        $school = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.school.index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
         $state = \App\Models\State::lists('name','name')->toArray();
         $state = [null=>'Please Select'] + $state;
        return view('backend.school.create', compact('state'));
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
            $this->school->create($data);
            Flash::message('School was successfully added');

            return Redirect::route('admin.school');
        } catch (ValidationException $e) {
            return Redirect::route('admin.school.create')->withInput()->withErrors($e->getErrors());
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
        $school = $this->school->find($id);

        return view('backend.school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $school = $this->school->find($id);
        $state = \App\Models\State::lists('name','name')->toArray();
        $state = [null=>'Please Select'] + $state;
        return view('backend.school.edit', compact('school','state'));
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
            $this->school->update($id, $data);
            Flash::message('School was successfully updated');

            return Redirect::route('admin.school');
        } catch (ValidationException $e) {
            return Redirect::route('admin.school.edit',['id'=>$id])->withInput()->withErrors($e->getErrors());
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
        $this->school->delete($id);
        Flash::message('School was successfully deleted');

        return Redirect::route('admin.school');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $school = $this->school->find($id);

        return view('backend.school.confirm-destroy', compact('school'));
    }

}
