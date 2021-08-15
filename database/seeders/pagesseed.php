<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class pagesseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker::create(); 
        $sayfalar=['Hakkımızda','Kariyer','Vizyonumuz','Misyonumuz'];
        $count=0;

        foreach ($sayfalar as $s ) {
            // code...
        $count++;
            
                DB::table('pages')->insert([
                'title'=>$s,
                'slug'=>Str::slug($s),
                'image'=>'https://teknoguru.net/wp-content/uploads/2020/02/blog3.jpg',
                'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
                ]);
            
        }
    }
}
