<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\config;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Storage;


class AyarlarController extends Controller
{
    public function __construct(){
        if(config::find(1)->active==0){
            return redirect()->to('site-bakimda')->send();

        }
       

    }
    public function index()
    {
        $ayarlar=config::first();
        return view('back.ayarlar.index',compact('ayarlar'));
    }
    public function guncelle(Request $request)
    {

       $ayar= config::find(1);
       $ayar->title=$request->title;
       $ayar->active=$request->status;
       $ayar->facebook=$request->facebook;
       $ayar->twitter=$request->twitter;
       $ayar->github=$request->github;
       $ayar->youtube=$request->youtube;
       $ayar->instagram=$request->instagram;
       $ayar->linkedin=$request->linkedin;
       if($request->hasfile('logo')){
            $imagename=Str::slug($request->title).'-logo'.'.'.$request->logo->getClientOriginalExtension();
            
            $request->logo->move(public_path('uploads'),$imagename);
            

             $ayar->logo='/uploads/'.$imagename;



         }
         if($request->hasfile('favicon')){
            $imagename=Str::slug($request->title).'-favicon'.'.'.$request->favicon->getClientOriginalExtension();
            
            $request->favicon->move(public_path('uploads'),$imagename);
             $ayar->favicon='/uploads/'.$imagename;


         }
       $ayar->save();
      return redirect()->route('ayarlar')->with('success','Ayarlar başarıyla güncellendi.');
    }

}
