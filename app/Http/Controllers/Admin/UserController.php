<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use File;
use Flash;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Sentinel;
use Validator;
use View;
use Str;
use Carbon\Carbon;

/**
 * Class UserController.
 *
 
 */
class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) {
        $users = User::orderBy('created_at', 'DESC');

        $orderby = '';
        if ($request->orderby) {
            $orderby = $request->orderby;
            if ($orderby) {
                foreach ($orderby as $ob):
                    $o = explode('~', $ob);
                    $users = User::orderBy($o[0], $o[1]);
                endforeach;
            }
        }
        $user_type = '';
        if ($request->user_type) {
            $user_type = $request->user_type;
            if ($user_type == 'Admin')
                $users = $users->where('isAdmin', '=', '1');
            else if ($user_type == 'Dealer'):
                $users = $users->whereHas('roles', function($query) {
                    $query->where('slug', 'dealer');
                });
            else:
                $users = $users->where('isAdmin', '!=', '1');
                $users = $users->whereHas('roles', function($query) {
                    $query->where('slug', 'customer');
                });
            endif;
        }
        $name = '';
        if ($request->name) {
            $name = $request->name;
            if ($name) {
                $users = $users->where(function ($query) use($name) {
                    $query->orWhere('first_name', 'like', '%' . $name . '%');
                    $query->orWhere('last_name', 'like', '%' . $name . '%');
                    $query->orWhere('username', 'like', '%' . $name . '%');
                });
            }
        }
        $email = '';
        if ($request->email) {
            $email = $request->email;
            if ($email)
                $users = $users->where('email', 'like', '%' . $email . '%');
        }
        $dealer_id = '';
        if ($request->dealer_id) {
            $dealer_id = $request->dealer_id;
            if ($dealer_id) {
                $users->WhereHas('dealer', function ($query) use($dealer_id) {
                    $query->where('dealer_user.dealer_id', $dealer_id);
                });
            }
        }
        $phone = '';
        if ($request->phone) {
            $phone = $request->phone;
            if ($phone) {
                $users->WhereHas('userinfo', function ($query) use($phone) {
                    $query->where('userinfo.phone', 'like', '%' . $phone . '%');
                });
            }
        }
        $from = '';
        if ($request->from) {
            $from = $request->from;
            if ($from)
                $users = $users->whereDate('created_at', '>=', $from);
        }

        $to = '';
        if ($request->to) {
            $to = $request->to;
            if ($to)
                $users = $users->whereDate('created_at', '<=', $to);
        }
        $users = $users->paginate(10);
        if ($user_type) {
            $users = $users->appends(['user_type' => $user_type]);
        }
        if ($name) {
            $users = $users->appends(['name' => $name]);
        }
        if ($email) {
            $users = $users->appends(['email' => $email]);
        }
        if ($phone) {
            $users = $users->appends(['phone' => $phone]);
        }
        if ($users) {
            //Get User Roles
            foreach ($users as &$user) {
                $userRoles = $user->getRoles()->lists('name', 'id')->toArray();
                if (count($userRoles) > 0) {
                    $user['roles'] = implode(', ', $userRoles);
                    $user->roles = implode(',<br/>', $userRoles);
                }
            }
        }

        return view('backend.user.index', compact('users', 'user_type', 'from', 'to', 'name', 'phone', 'email'))->with('active', 'user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $roles = Role::lists('name', 'id');
        $tier = \App\Models\Tier::lists('title', 'id');
        $user = null;
        $ownshipping = array();
        return view('backend.user.create', compact('roles', 'tier', 'user', 'ownshipping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        try {
            $rules = array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:4',
                'confirm_password' => 'required|same:password',
            );

            $validation = Validator::make(Input::all(), $rules);

            if ($validation->fails()) {
                return Redirect::action('Admin\UserController@create')->withErrors($validation)->withInput();
            }
            //$plain_pass = bcrypt(Input::get('password'));
            //Input::merge(['password' => $plain_pass]);
            Input::merge(['username' => Input::get('first_name') . " " . Input::get('last_name')]);
            Input::merge(['slug' => Str::slug(Input::get('first_name') . " " . Input::get('last_name'), '-')]);

            $user = Sentinel::registerAndActivate(Input::all());
            $infodata = $request->userInfo;
            $infodata['dob'] = Carbon::parse($infodata['dob'])->format('m-d-Y');

            $userInfo = UserInfo::create(array_merge($infodata, ['user_id' => $user->id]));
            if ($request->hasFile('userInfo')) {
                $dest = 'uploads/users/' . $user->username . '/photos/';
                //File::delete(public_path().$user->userInfo->photo);
                $name = str_random(11) . '_' . $request->file('userInfo')['photo']->getClientOriginalName();
                $request->file('userInfo')['photo']->move($dest, $name);

                $userInfo->where('user_id', $user->id)->update(['photo' => '/' . $dest . $name]);
            }
            if (Input::get('roles')) {
                foreach (Input::get('roles') as $role => $id) {
                    $role = Sentinel::findRoleByName($role);
                    $role->users()->attach($user);
                }
            }
            Flash::message('User was successfully created');

            return Redirect::to(getLang() . '/admin/user/' . $user->id . '/edit#panel_user_locations');
        } catch (ValidationException $e) {
            return Redirect::route('admin.user.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    public function storee(Request $request) {
        $formData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'username' => $request->get('first_name') . ' ' . $request->get('last_name'),
            'slug' => str_slug(($request->get('first_name') . ' ' . $request->get('last_name')), '-'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'confirm-password' => $request->get('confirm_password'),
            'roles' => $request->get('roles'),
            'isAdmin' => $request->get('isAdmin'),
            'uuid' => \Uuid::generate(3, $request->get('first_name') . $request->get('last_name'), Uuid::NS_DNS),
        ];

        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'confirm-password' => 'required|same:password',
        ];

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('Admin\UserController@create')->withErrors($validation)->withInput();
        }

        $user = Sentinel::registerAndActivate([
                    'email' => $formData['email'],
                    'password' => $formData['password'],
                    'first_name' => $formData['first_name'],
                    'last_name' => $formData['last_name'],
                    'username' => $formData['username'],
                    'isAdmin' => $formData['isAdmin'],
                    'slug' => $formData['slug'],
                    'activated' => 1,
        ]);

        if (isset($formData['roles'])) {
            foreach ($formData['roles'] as $role => $id) {
                $role = Sentinel::findRoleByName($role);
                $role->users()->attach($user);
            }
        }

        Flash::message('User was successfully created');

        return Redirect::route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id) {
        $user = Sentinel::findUserById($id);
        $userRoles = $user->getRoles()->lists('name', 'id')->toArray();
        if (count($userRoles) > 0) {
            $user['roles'] = implode(', ', $userRoles);
        }

        return view('backend.users.show', compact('user'))->with('active', 'user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id) {
        //$user = Sentinel::findUserById($id);
        $user = User::find($id);
//      
//        $userLocation = $user->location;
//        $billing = $userLocation->where('location_type', 'billing')->first();
//        $mailing = $userLocation->where('location_type', 'profile')->first();
//        //dd($billing);
//        $userRoles = $user->getRoles()->lists('name', 'id')->toArray();
//        $roles = Role::lists('name', 'id');

        return view('backend.user.edit', compact('user', 'roles', 'ownshipping', 'dealers', 'tier', 'userRoles', 'userInfo', 'userLocation', 'billing', 'mailing'))->with('active', 'user');
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
            $rules = array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'min:4',
                'confirm-password' => 'same:password',
            );
            $input = Input::all();
            if (!$input['password'])
                unset($input['password']);
            else
                $input['password'] = bcrypt($input['password']);
            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {
                return Redirect::to(getLang() . '/admin/user/' . $id . '/edit#panel_edit_account')->withErrors($validation)->withInput();
            }
            $user = User::find($id);
            $user->update($input);
            $infodata = $request->userInfo;
            $infodata['dob'] = Carbon::parse($infodata['dob'])->format('Y-m-d H:i:s');
            Userinfo::updateOrCreate(array('user_id' => $user->id), $infodata);
            if ($request->hasFile('userInfo')) {
                $dest = 'uploads/users/' . $user->username . '/photos/';
                File::delete(public_path() . $user->userInfo->photo);
                $name = str_random(11) . '_' . $request->file('userInfo')['photo']->getClientOriginalName();
                $request->file('userInfo')['photo']->move($dest, $name);

                $user->userInfo->where('user_id', $user->id)->update(['photo' => '/' . $dest . $name]);
            }
            $oldRoles = $user->getRoles()->lists('name', 'id')->toArray();
            if ($request->get('tier')) {
                $user->tier()->detach();
                $user->tier()->attach($request->get('tier'));
            }

            foreach ($oldRoles as $id => $role) {
                $roleModel = Sentinel::findRoleByName($role);
                $roleModel->users()->detach($user);
            }

            if (Input::get('roles')) {
                foreach (Input::get('roles') as $role => $id) {
                    $role = Sentinel::findRoleByName($role);
                    $role->users()->attach($user);
                }
            }
            if ($user->isDealer) {
                if ($request->get('dealer_id')) {
                    $user->dealer()->detach();
                    $user->dealer()->attach($request->get('dealer_id'));
                }
                Flash::message('Dealer was successfully updated');
                return Redirect::route('admin.user.index', ['user_type=Dealer']);
            } else {
                $user->dealer()->detach();
                Flash::message('User was successfully updated');
                return Redirect::route('admin.user.index');
            }
        } catch (ValidationException $e) {
            return Redirect::route('admin.user.edit')->withInput()->withErrors($e->getErrors());
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
        $user = Sentinel::findById($id);
        $user->delete();

        Flash::message('User was successfully deleted');

        return Redirect::route('admin.user.index');
    }

    public function confirmDestroy($id) {
        $user = Sentinel::findById($id);

        return view('backend.user.confirm-destroy', compact('user'))->with('active', 'user');
    }

}
