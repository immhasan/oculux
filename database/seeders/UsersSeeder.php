<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'=>Str::random(10),
            'last_name'=>Str::random(10),
            'email'=>Str::random(10).'@gmail.com',
            'password'=>Str::random(10),
            'address'=>Str::random(10),
            'phone'=>Str::random(10),
            'image'=>Str::random(10),
            'designation'=>Str::random(10),
            'role_id'=>1,
            'status'=>'enable'
        ]);
    }
}
