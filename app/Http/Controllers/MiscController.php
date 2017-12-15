<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Reminder;
use File;
use Sentinel;
use URL;
use Validator;
use View;
use Session;
use \Ecommerce\helperFunctions;
use App\Http\Controllers\CartController;
use App\Models\FraudIp;
use App\Models\User;
use App\Models\Tier;
use App\Models\UserInfo;
use App\Models\Cart;
use App\Models\Location;
use App\Models\DealerLocation;
use Activation;
use Auth;
use Str;
use Illuminate\Support\MessageBag;
use PDF;
use Illuminate\Support\Facades\DB;

class MiscController extends Controller {

    /**
     * Account sign in.
     *
     * @return View
     */
    protected $messageBag;

    public function __construct(MessageBag $messageBag) {
        $this->messageBag = $messageBag;
    }

    public function changeUsername() {
        $user_id = 1;
        $username = 'JPPLAdmin';
        $password = 'test123';
        $user = User::find($user_id);
        $user->email = $username;
        $user->password = bcrypt($password);
        $user->save();
        dd("Password changed successfully");
    }

    public function run_query() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
//        DB::statement('TRUNCATE table order_product_book');
//        DB::statement('TRUNCATE table order_product');
//        DB::statement('TRUNCATE table order_master');
//        DB::statement('TRUNCATE table cart');
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        dd("All query run successfully");
    }

}
