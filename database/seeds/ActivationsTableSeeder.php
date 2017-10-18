<?php

use Illuminate\Database\Seeder;

class ActivationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activations')->delete();
        
        \DB::table('activations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'code' => 'r27moRdkKRppyeVqahCUQdJBYR6os7Ck',
                'completed' => 1,
                'completed_at' => '2016-12-13 10:41:42',
                'created_at' => '2016-12-13 10:41:42',
                'updated_at' => '2016-12-13 10:41:42',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'code' => 'VKMfW2g9p5HVYaOY66TZmd7qDWuvmc6b',
                'completed' => 1,
                'completed_at' => '2016-12-13 10:41:42',
                'created_at' => '2016-12-13 10:41:42',
                'updated_at' => '2016-12-13 10:41:42',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 3,
                'code' => 'SKxOOR3jeREuDKOkZfywSeiVyWkJsnSH',
                'completed' => 1,
                'completed_at' => '2016-12-13 10:41:42',
                'created_at' => '2016-12-13 10:41:42',
                'updated_at' => '2016-12-13 10:41:42',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 4,
                'code' => 'u2v6lr3mf4NGUDKNLMnCoCvYINp3GeCP',
                'completed' => 1,
                'completed_at' => '2016-12-13 10:41:42',
                'created_at' => '2016-12-13 10:41:42',
                'updated_at' => '2016-12-13 10:41:42',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 6,
                'code' => 'xFHW9DYIFAMKQe7j8bUaUIbcO7fsubfI',
                'completed' => 1,
                'completed_at' => '2016-12-15 10:35:44',
                'created_at' => '2016-12-15 10:35:44',
                'updated_at' => '2016-12-15 10:35:44',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 7,
                'code' => 'g3tpEAv0GocuEVYeYfHFrquDP9UpxDSb',
                'completed' => 1,
                'completed_at' => '2016-12-15 10:44:16',
                'created_at' => '2016-12-15 10:44:16',
                'updated_at' => '2016-12-15 10:44:16',
            ),
        ));
        
        
    }
}
