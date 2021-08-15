<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class configSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
        'title'=>'Fatih AVCI',
        'created_at'=>now(),
        'updated_at'=>now()
        ]);
    }
}
