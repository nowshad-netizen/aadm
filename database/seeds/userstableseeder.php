<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class userstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'bname'=>'tanvir',
            'username'=>'tanvir',
            'f_name'=>'tanvir',
            'm_name'=>'fm',
            'present_address'=>'barisal',
            'permanent_address'=>'dhk',
            'dob'=>'2019',
            'religion'=>'islam',
            'passed'=>'2019',
            'number'=>'017000000',
            'fblink'=>'fb.com/hjdh',
            'occupation'=>'bank',
        ]);
    }
}
