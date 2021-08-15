<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        'name'=>'Fatih',
        'email'=>'fatih@test.com',
        'password'=>bcrypt(102030)
        ]);
    }
}
