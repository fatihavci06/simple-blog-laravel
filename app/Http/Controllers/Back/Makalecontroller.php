<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\content;
use App\Models\Category;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\File;
class Makalecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contents']=content::orderby('created_at','asc')->get();
        return view('back.makaleler.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategoriler']=Category::all();
        return view('back.makaleler.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required|min:5',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:100',
        'category'=>'required',
        'statu'=>'required'
       ]);
        
        
        
        
        
        $content=new content;
        $content->title=$request->title;
        $content->category_id=$request->category;
        $content->content=$request->icerik;
        $content->status=$request->statu;
         $content->slug=Str::slug($request->title);
         if($request->hasfile('image')){
            $imagename=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            
            $request->image->move(public_path('uploads'),$imagename);
             $content->image='/uploads/'.$imagename;


         }
         $content->save();
         toastr()->success('Başarılı','Başarıyla içerik eklendi');
          return redirect()->route('makale.yeni')->with('success','Makale başarıyla eklendi');
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $id;
    }
     public function switch(Request $request)
    {
       $icerik=content::findOrFail($request->id);
       if($request->status=='False'){
        $s=1;
       }
       else{
        $s=0;
       }
       $icerik->status=$s;
       $icerik->save();
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kategoriler']=Category::all();
        $data['makale']=content::findOrFail($id);//eğer yoksa not found döndürüyor
        
        return view('back.makaleler.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
        'title'=>'required|min:5',
            'image'=>'image|mimes:jpeg,png,jpg|max:100',
        'category'=>'required'
       ]);
        
        
        
        
        
        $content=content::findOrFail($id);
        $content->title=$request->title;
        $content->category_id=$request->category;
        $content->content=$request->icerik;
        $content->status=$request->statu;
         $content->slug=Str::slug($request->title);
         if($request->hasfile('image')){
            $imagename=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            
            $request->image->move(public_path('uploads'),$imagename);
             $content->image='/uploads/'.$imagename;


         }
         $content->save();
         toastr()->success('Başarılı','Başarıyla içerik güncellendi');
          return redirect()->route('back.makaleler.index')->with('success','Makale başarıyla eklendi');
        return 'geldi'.$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $makale = content::find($id);
        $makale->delete();
        toastr()->success('Makale başarıyla silindi');
        return redirect()->route('back.makaleler.index');
    }
    public function trashed()
    {   
        $data['contents']=content::onlyTrashed()->orderby('deleted_at','asc')->get();
        return view('back.makaleler.trashed',$data);
    }
    public function recover($id)
    {   
        content::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale başarıyla geri yüklendi');
        return redirect()->back();

        
    }
    public function harddelete($id)
    {   

        $makale = content::onlyTrashed()->find($id);
        if(File::exists(public_path($makale->image))){
            File::delete(public_path($makale->image));
        }
         $makale->forceDelete();
        toastr()->success('Makale başarıyla silindi');
         return redirect()->route('delete.makale');
    }

}
