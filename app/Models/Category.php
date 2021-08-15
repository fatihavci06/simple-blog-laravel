<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function contentcount(){
       
         return  $this->hasMany(content::class, 'category_id', 'id')->where('status',1)->count();  //content tablosundaki user benim(user tablosu) idime eşit demek
    }
    public function icerikal(){
       
         return  $this->hasMany(content::class, 'category_id', 'id');  //content tablosundaki user benim(user tablosu) idime eşit demek
    }
}
