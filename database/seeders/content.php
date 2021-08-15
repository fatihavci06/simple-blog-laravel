<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class content extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create(); 
        for($i=0;$i<=4;$i++){ //20 adet kayıt ekledik dbye
            $title=$faker->sentence(6);

            DB::table('contents')->insert([
            'category_id'=>rand(1,7),
            'title'=>$title,
            'image'=>$faker->imageUrl(800,400, 'cats', true, 'Fatih AVCI '),
            'status'=>rand(0,1),
            'hit'=>0,
            'content'=>$faker->text,
            'slug'=>Str::slug($title),
            'created_at'=>$faker->dateTime('now'),
            'updated_at'=>now()

        
            ]);
        }
    }
}
