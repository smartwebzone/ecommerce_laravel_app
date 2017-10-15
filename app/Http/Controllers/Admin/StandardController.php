<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Standard\StandardInterface;
use App\Repositories\Standard\StandardRepository as Standard;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;

/**
 * Class StandardController.
 *
 
 */
class StandardController extends Controller {

    protected $standard;
    protected $perPage;

    public function __construct(StandardInterface $standard) {
        $this->standard = $standard;
        View::share('active', 'blog');
        $this->perPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->standard->paginate(Input::get('page', 1), $this->perPage, true);
        $standard = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.standard.index', compact('standard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('backend.standard.create');
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
            $this->standard->create($data);
            Flash::message('Standard was successfully added');

            return Redirect::route('admin.standard');
        } catch (ValidationException $e) {
            return Redirect::route('admin.standard.create')->withInput()->withErrors($e->getErrors());
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
        $standard = $this->standard->find($id);

        return view('backend.standard.show', compact('standard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $standard = $this->standard->find($id);
        return view('backend.standard.edit', compact('standard'));
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
            $this->standard->update($id, $data);
            Flash::message('Standard was successfully updated');

            return Redirect::route('admin.standard');
        } catch (ValidationException $e) {
            return Redirect::route('admin.standard.edit',['id'=>$id])->withInput()->withErrors($e->getErrors());
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
        $this->standard->delete($id);
        Flash::message('Standard was successfully deleted');

        return Redirect::route('admin.standard');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $standard = $this->standard->find($id);

        return view('backend.standard.confirm-destroy', compact('standard'));
    }

}
