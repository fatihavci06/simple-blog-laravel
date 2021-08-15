<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class sayfacontroller extends Controller
{
    public function index()
    {
        $data['page']=page::orderby('order','asc')->get();
        return view('back.sayfalar.index',$data);
    }
    public function siralama(Request $request)
    {
      
       foreach ($request->sayfa as $key => $order) {
           page::where('id',$order)->update(['order'=>$key]);
       }
    }
    public function create()
    {

        return view('back.sayfalar.create');
    }
    public function sil($id)
    {
        $sayfa = page::findOrFail($id);
        if(File::exists(public_path($sayfa->image))){
            File::delete(public_path($sayfa->image));
        }
        $sayfa->delete();
        return redirect()->route('sayfalar.index')->with('message','Sayfa başarıyla silindi');
    }
    public function duzenle($id)
    {   
        $data['sayfa']=page::findOrFail($id);
        return view('back.sayfalar.update',$data);
    }
    public function sayfaguncelle(Request $request)
    {   
         $request->validate([
        'title'=>'required|min:4',
         'statu'=>'required',
         'image'=>'image|mimes:jpeg,png,jpg|max:300',
       ]);
        
        $sayfa= page::find($request->id);

        $sayfa->title=$request->title;
      
        $sayfa->content=$request->icerik;
        $sayfa->status=$request->statu;
         $sayfa->slug=Str::slug($request->title);
         if($request->hasfile('image')){
            $imagename=Str::slug($request->title).'logo'.'.'.$request->image->getClientOriginalExtension();
            
            $request->image->move(public_path('uploads'),$imagename);
             $sayfa->image='/uploads/'.$imagename;


         }
          if($request->hasfile('favicon')){
            $imagename=Str::slug($request->title).'favicon'.'.'.$request->favicon->getClientOriginalExtension();
            
            $request->favicon->move(public_path('uploads'),$imagename);
             $sayfa->favicon='/uploads/'.$imagename;


         }
         $sayfa->save();
        return redirect()->route('sayfalar.index')->with('message','Sayfa başarıyla guncellendi');
    }

    public function insert(Request $request)
    {
        $request->validate([
        'title'=>'required|min:4',
         'statu'=>'required',
         'image'=>'required|image|mimes:jpeg,png,jpg|max:100',
       ]);
         $varmi=page::where('slug','=',Str::slug($request->title))->first();
         if($varmi){
            return redirect()->back()->with('message', Str::slug($request->title).' adında zaten sayfa mevcut');

         }
         $sayfa= new page;
         $sayfa->title=$request->title;
         $sayfa->content=$request->icerik;
          $sayfa->status=$request->statu;
         $sayfa->slug=Str::slug($request->title);
         if($request->hasfile('image')){
            $imagename=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            
            $request->image->move(public_path('uploads'),$imagename);
             $sayfa->image='/uploads/'.$imagename;


         }
         $sayfa->save();
          return redirect()->route('sayfa.yeni')->with('message','Sayfa başarıyla eklendi');


       
    }
    
}
