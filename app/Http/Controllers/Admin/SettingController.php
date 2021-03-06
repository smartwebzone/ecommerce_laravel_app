<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Flash;
use Input;
use Redirect;
use View;

/**
 * Class SettingController.
 *
 
 */
class SettingController extends Controller
{
    public function index()
    {
        $obj = (Setting::where('lang', getLang())->first()) ?: new Setting();

        $jsonData = $obj->settings;
        $setting = json_decode($jsonData, true);

        if ($setting === null) {
            $setting = [
                'site_title'       => null,
                'ga_code'          => null,
                'meta_keywords'    => null,
                'meta_description' => null,
            ];
        }

        return view('backend.setting.setting', compact('setting'))->with('active', 'settings');
    }

    public function save()
    {
        $setting = (Setting::where('lang', getLang())->first()) ?: new Setting();

        $formData = Input::all();
        unset($formData['_token']);

        $json = json_encode($formData);
        $setting->fill(['settings' => $json, 'lang' => getLang()])->save();

        Flash::message('Settings was successfully updated');

        return Redirect::route('admin.settings');
    }
}
