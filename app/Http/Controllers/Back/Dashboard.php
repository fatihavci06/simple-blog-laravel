<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;
use App\Models\content;
use App\Models\category;
class Dashboard extends Controller
{
    public function index(){
        $data['makalesayi']=content::all()->count();
        $data['hitsayi']=content::sum('hit');
        $data['kategorisayi']=category::all()->count();;
        $data['sayfasayi']=page::all()->count();


        return view('back.dashboard',$data);
    }
}
