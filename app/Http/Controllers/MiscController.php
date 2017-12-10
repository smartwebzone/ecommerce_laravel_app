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
        DB::statement('ALTER TABLE `standard_master` ADD `position` INT NULL AFTER `status`');
        DB::statement('update standard_master set position = id');
        DB::statement('ALTER TABLE `order_product` ADD `school_id` INT(11) NOT NULL AFTER `price`, ADD `standard_id` INT(11) NOT NULL AFTER `school_id`, ADD `company_id` INT(11) NOT NULL AFTER`standard_id`, ADD `is_taxable` TINYINT(4) NOT NULL AFTER `company_id`, ADD `title` VARCHAR(100) NOT NULL AFTER `is_taxable`, ADD `description` VARCHAR(100) NOT NULL AFTER`title`, ADD `long_description` TEXT NOT NULL AFTER `description`, ADD `instate_shipping_charges` DECIMAL(10,2) NOT NULL AFTER `long_description`, ADD`outstate_shipping_charges` DECIMAL(10,2) NOT NULL AFTER `instate_shipping_charges`');
        DB::statement('ALTER TABLE `order_product` ADD `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`)');
        DB::statement('ALTER TABLE `company_master` ADD `gstn` VARCHAR(100) NULL AFTER `zip`');
        DB::statement('CREATE TABLE `order_product_book` (
                        `id` int(11) UNSIGNED NOT NULL,
                        `book_id` int(11) UNSIGNED NOT NULL,
                        `order_product_id` int(11) UNSIGNED NOT NULL,
                        `company_id` int(11) UNSIGNED NOT NULL,
                        `standard_id` int(11) UNSIGNED NOT NULL,
                        `medium` text NOT NULL,
                        `name` varchar(100) NOT NULL,
                        `description` varchar(255) NOT NULL,
                        `author` varchar(100) NOT NULL,
                        `book_code` varchar(50) NOT NULL,
                        `price` decimal(10,2) NOT NULL,
                        `is_taxable` tinyint(4) NOT NULL,
                        `tax` decimal(10,2) NOT NULL,
                        `price_after_tax` decimal(10,2) NOT NULL,
                        `shipping_charges` decimal(10,2) NOT NULL,
                        `quantity` int(11) NOT NULL,
                        `weight` decimal(10,2) DEFAULT NULL,
                        `hsn_code` varchar(50) DEFAULT NULL
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1;ALTER TABLE `order_product_book` ADD PRIMARY KEY (`id`);ALTER TABLE `order_product_book` MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;');
        DB::statement('TRUNCATE table order_product');
        DB::statement('TRUNCATE table order_master');
        DB::statement('TRUNCATE table cart');
    }

}
