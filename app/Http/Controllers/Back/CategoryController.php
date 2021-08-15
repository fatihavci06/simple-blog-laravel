<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Validator;

class CategoryController extends Controller
{
   public function index()
    {
        $data['categories']=Category::orderby('id','asc')->get();
        return view('back.kategoriler.index',$data);
    }
    public function ekle(Request $request)
    {  
      $request->validate([
        'category'=>'required|min:4',
         'status'=>'required'
       ]);

      $varmi=Category::where('slug','=',Str::slug($request->category))->first();
    if($varmi){
         toastr()->error('Başarısız',$request->category.'adında bir kategori mevcut.');
         return redirect()->back();
      }
       $category= new Category;
       $category->name=$request->category;
       $category->status=$request->status;
       $category->slug=Str::slug($request->category);
       
       $category->save();
       toastr()->success('Başarılı','Başarıyla kategori eklendi');
      return redirect()->route('kategori.liste');
       
    }
    public function kategoricek(Request $request)
    {
      $category=Category::findOrFail($request->id);
      return response()->json($category);
       
     
    }
     public function kategoriguncelle(Request $request)
    {  
      $request->validate([
        'category'=>'required|min:4',
         'status'=>'required'
       ]);

      $varmi=Category::where('slug','=',Str::slug($request->category))->whereNotIn('id',[$request->category_id])->first();
      $varmi2=Category::where('slug','=',Str::slug($request->slug))->whereNotIn('id',[$request->category_id])->first();
    if($varmi or $varmi2){
         toastr()->error('Başarısız',$request->category.'adında bir kategori mevcut.');
         return redirect()->back();
      }
       $category= Category::find($request->category_id);
       
       $category->name=$request->category;
       $category->status=$request->status;
       $category->slug=Str::slug($request->slug);
       
       $category->save();
       toastr()->success('Başarılı','Başarıyla kategori güncellendi');
      return redirect()->route('kategori.liste');
       
    }

    public function sil($id)
    {
        $kategori = Category::findOrFail($id);
        if($kategori->contentcount()>1){
          return redirect()->route('kategori.liste');
        }
        $kategori->delete();
        return redirect()->route('kategori.liste');
      
        
    }
}
