<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Repositories\Email\EmailInterface;
use App\Repositories\Email\EmailRepository as Email;
use App\Services\Pagination;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;

/**
 * Class EmailController.
 *
 
 */
class EmailController extends Controller {

    protected $email;
    protected $perPage;

    public function __construct(EmailInterface $email) {
        $this->email = $email;
        View::share('active', 'blog');
        $this->perPage = 10;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pagiData = $this->email->paginate(Input::get('page', 1), $this->perPage, true);
        $email = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.email.index', compact('email'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
         $standard = \App\Models\Standard::lists('name','id')->toArray();
         $standard = [null=>'Please Select'] + $standard;
         
         $company = \App\Models\School::lists('name','id')->toArray();
         $company = [null=>'Please Select'] + $company;
        return view('backend.email.create', compact('company','standard'));
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
            $this->email->create($data);
            Flash::message('Email was successfully added');

            return Redirect::route('admin.email');
        } catch (ValidationException $e) {
            return Redirect::route('admin.email.create')->withInput()->withErrors($e->getErrors());
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
        $email = $this->email->find($id);

        return view('backend.email.show', compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        $email = $this->email->find($id);
         $standard = \App\Models\Standard::lists('name','id')->toArray();
         $standard = [null=>'Please Select'] + $standard;
         
         $company = \App\Models\School::lists('name','id')->toArray();
         $company = [null=>'Please Select'] + $company;
        return view('backend.email.edit', compact('email','standard','company'));
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
            $this->email->update($id, $data);
            Flash::message('Email was successfully updated');

            return Redirect::route('admin.email');
        } catch (ValidationException $e) {
            return Redirect::route('admin.email.edit',['id'=>$id])->withInput()->withErrors($e->getErrors());
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
        $this->email->delete($id);
        Flash::message('Email was successfully deleted');

        return Redirect::route('admin.email');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id) {
        $email = $this->email->find($id);

        return view('backend.email.confirm-destroy', compact('email'));
    }

}
