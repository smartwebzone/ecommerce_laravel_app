<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     */
    public function run()
    {
        DB::table('settings')->truncate();

        $settings = [
            'settings' => '{"site_title":"Grace Manager & CMS - Laravel 5 Multi Language Content Managment System","ga_code":"UA-89078401-1","meta_keywords":"Grace Company Multi Language Content Managment System and company manager custom build","meta_description":"Multi Language Content and Company Managment System"}',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'lang' => 'en', ];

        DB::table('settings')->insert($settings);
    }
}
