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
use App\Models\Standard;
use Illuminate\Http\Request;
use App\Models\SchoolStandard;

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
        $this->perPage = 50;
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
        $state = \App\Models\State::orderBy('name', 'asc')->lists('name', 'name')->toArray();
        $state = [null => 'Please Select'] + $state;
        $standard = Standard::orderBy('name', 'asc')->lists('name', 'id')->toArray();
        return view('backend.school.create', compact('state', 'standard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        try {
            $data = Input::all();
            $data['added_by'] = Sentinel::getUser()->id;
            unset($data['standards']);
            $school_id = $this->school->create($data);
            $school = $this->school->find($school_id);
            if (!empty($request->standards)) {
                $school->standard()->sync($request->standards);
            }
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
        $school_standards = $this->school->find($id)->standard()->get();
        $existing_standards = array();
        foreach($school_standards as $row){
            $existing_standards[] = $row->id;
        }
        $state = \App\Models\State::orderBy('name', 'asc')->lists('name', 'name')->toArray();
        $state = [null => 'Please Select'] + $state;
        $standard = Standard::orderBy('name', 'asc')->lists('name', 'id')->toArray();
        return view('backend.school.edit', compact('school', 'state', 'standard', 'existing_standards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id) {
        try {
            $data = Input::all();
            $data['updated_by'] = Sentinel::getUser()->id;
            unset($data['standards']);
            $this->school->update($id, $data);
            $school = $this->school->find($id);
            if (!empty($request->standards)) {
                $school->standard()->sync($request->standards);
            }
            Flash::message('School was successfully updated');

            return Redirect::route('admin.school');
        } catch (ValidationException $e) {
            return Redirect::route('admin.school.edit', ['id' => $id])->withInput()->withErrors($e->getErrors());
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
