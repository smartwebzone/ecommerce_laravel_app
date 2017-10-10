<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LockScreenController extends Controller
{
    public function lockscreen($id){
        $user = Sentinel::findUserById($id);
        return view('backend.lockscreen',compact('user'));
    }

    public function postLockscreen(Request $request){
        $password = Sentinel::getUser()->password;
        if(Hash::check($request->password,$password)){
            return 'success';
        }
        else{
            return 'error';
        }
    }
}
