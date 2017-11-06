<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Flash;
use Input;
use View;
use Redirect;
use Sentinel;
use App\Models\MissingSchool;
use App\Models\MissingStandard;

/**
 * Class StandardController.
 *

 */
class UnavailableController extends Controller {


    public function __construct() {
        
    }
    public function standards() {
        $standards=  MissingStandard::all();

        return view('backend.unavailable.standards', compact('standards'));
    }
    public function schools() {
      $schools=  MissingSchool::all();

        return view('backend.unavailable.schools', compact('schools'));
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function standarddestroy($id) {
        MissingStandard::find($id)->delete();
        Flash::message('Standard was successfully deleted');

        return Redirect::route('admin.unavailable.standards');
    }
    public function schooldestroy($id) {
        MissingSchool::find($id)->delete();
        Flash::message('School was successfully deleted');

        return Redirect::route('admin.unavailable.schools');
    }

}
