<?php

use Illuminate\Database\Seeder;

// use \Webpatser\Uuid\Uuid;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
//	    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//	    App\Models\User::truncate();
//	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \DB::table('users')->insert([
            0 => [
                'id'             => 1,
                'email'          => 'info@graceframe.com',
                'password'       => bcrypt('@dmin'),
                'isAdmin'        => 1,
                'remember_token' => null,
                'permissions'    => null,
                'last_login'     => null,
                'first_name'     => 'Grace',
                'last_name'      => 'Company',
                'username'       => '',
                'slug'           => null,
                'created_at'     => '2016-12-13 10:41:42',
                'updated_at'     => '2016-12-13 10:41:42',
                // 'uuid' => Uuid::generate(3, ['Grace','Company'], Uuid::NS_DNS),
                'referral_id'    => '',
                'is_online'      => '0',
                'referred_by'    => 0
            ],
            1 => [
                'id'             => 2,
                'email'          => 'phillip@graceframe.com',
                'password'       => '$2y$10$LUchk3Y9RNPPgztvOSN4COY1DX..o.plEfdh7LtGGmhlLHakw2CVO',
                'isAdmin'        => 1,
                'remember_token' => null,
                'permissions'    => null,
                'last_login'     => '2016-12-27 15:23:56',
                'first_name'     => 'phillip',
                'last_name'      => 'madsen',
                'username'       => 'Phillip Madsen',
                'slug'           => 'phillip-madsen',
                'created_at'     => '2016-12-13 10:41:42',
                'updated_at'     => '2016-12-27 15:23:56',
                // 'uuid' => Uuid::generate(3, ['phillip','madsen'], Uuid::NS_DNS),
                'referral_id'    => '',
                'is_online'      => '0',
                'referred_by'    => 0
            ],
            2 => [
                'id'             => 3,
                'email'          => 'rob@devsimplify.com',
                'password'       => '$2y$10$jiEY8c90BRrVLdFiykHAyOi4m2g0I/rZ.2kFb.QoAn5Q.Ijs4r1MO',
                'isAdmin'        => 1,
                'remember_token' => null,
                'permissions'    => null,
                'last_login'     => '2016-12-27 15:41:38',
                'first_name'     => 'Rob',
                'last_name'      => 'Modi',
                'username'       => '',
                'slug'           => null,
                'created_at'     => '2016-12-13 10:41:42',
                'updated_at'     => '2016-12-27 15:41:38',
                // 'uuid' =>Uuid::generate(3, ['rob','modi'], Uuid::NS_DNS),
                'referral_id'    => '',
                'is_online'      => '0',
                'referred_by'    => 0
            ],
            3 => [
                'id'             => 4,
                'email'          => 'brien@graceframe.com',
                'password'       => '$2y$10$McKuBpncBJR/OhX/.sNtke8HmKoHNAZ5G3Bk9lz7kcnszczwitnJ6',
                'isAdmin'        => 1,
                'remember_token' => null,
                'permissions'    => null,
                'last_login'     => '2016-12-27 15:31:58',
                'first_name'     => 'Brien',
                'last_name'      => 'Arnold',
                'username'       => '',
                'slug'           => null,
                'created_at'     => '2016-12-13 10:41:42',
                'updated_at'     => '2016-12-27 15:31:58',
                // 'uuid' => Uuid::generate(3, ['brien','arnold'], Uuid::NS_DNS),
                'referral_id'    => '',
                'is_online'      => '0',
                'referred_by'    => 0
            ],
            4 => [
                'id'             => 5,
                'email'          => 'joelflaker@gmail.com',
                'password'       => 'test123',
                'isAdmin'        => 1,
                'remember_token' => null,
                'permissions'    => null,
                'last_login'     => null,
                'first_name'     => 'Joel',
                'last_name'      => 'Flaker',
                'username'       => '',
                'slug'           => null,
                'created_at'     => '2016-12-14 12:40:10',
                'updated_at'     => '2016-12-14 12:40:10',
                // 'uuid' => Uuid::generate(3, ['Joel','madFlakersen'], Uuid::NS_DNS),
                'referral_id'    => '',
                'is_online'      => '0',
                'referred_by'    => 0
            ],

            5 => [
                'id'             => 6,
                'email'          => 'chris@graceframe.com',
                'password'       => '$2y$10$puDPna7YlJ6LG2nXRyUtAeJK.0N0dZzmRSY2/DTkPtOF1tuHRrF9a',
                'isAdmin'        => 0,
                'remember_token' => null,
                'permissions'    => null,
                'last_login'     => '2016-12-27 11:14:05',
                'first_name'     => 'Chris',
                'last_name'      => 'Svedin',
                'username'       => '',
                'slug'           => null,
                'created_at'     => '2016-12-21 16:14:05',
                'updated_at'     => '2016-12-27 11:14:05',
                // 'uuid' => Uuid::generate(3, ['chris','svedin'], Uuid::NS_DNS),
                'referral_id'    => '',
                'is_online'      => '0',
                'referred_by'    => 0
            ]
        ]);

    }
}
