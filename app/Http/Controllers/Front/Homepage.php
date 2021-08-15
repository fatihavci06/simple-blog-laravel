<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\content;
use App\Models\page;
use App\Models\contact;
use App\Models\config;
use App\Models\testcontact;
use Validator;
use Mail;
use Illuminate\Database\Eloquent\Builder;

class Homepage extends Controller
{
    public function __construct(){
        if(config::find(1)->active==0){
            return redirect()->to('site-bakimda')->send();

        }
        view()->share('pages',page::orderBy('order', 'asc')->where('status',1)->get());//tüm viewlerdan çekebiliriz ekstra controller ile viewe göndermeye gerek yok
        view()->share('categories',Category::where('status',1)->orderBy('id', 'asc')->get());//tüm viewlerdan çekebiliriz ekstra controller ile viewe göndermeye gerek yok

    }
    public function index(){
    $data['pages']=page::orderBy('order', 'asc')->get();
    $data['icerik']=content::where('status',1)->whereHas('getCategory', function (Builder $query) {
    $query->where('status',1);
    })->orderBy('created_at', 'desc')->paginate(2);  
    $data['categories']=Category::where('status',1)->orderBy('id', 'asc')->get();
    
    return view('front.homepage',$data);
    }

    public function single($kategori,$slug){
        $cat=Category::whereSlug($kategori)->where('status',1)->first()?? abort(403,'Böyle bir data bulunamadı');// 2 alt satırdakiyle whereSlug =:where('slug',$slug) aynı
        //$data['categories']=Category::orderBy('id', 'asc')->get();
        $data['icerik']= content::where('slug',$slug)->where('status',1)->where('category_id',$cat->id)->first() ?? abort(403,'Böyle bir data bulunamadı');
        $data['icerik']->increment('hit');
        return view('front.single',$data);
    }

    public function category($slug){
            $cat2=Category::where('slug',$slug)->where('status',1)->first() ?? abort(403,'Böyle bir data bulunamadı');
           // $data['categories']=Category::orderBy('id', 'asc')->get();//__consturcta share ettiğimiz için gerek kalmadı
            $data['kategoridetay']=$cat2;
            $data['icerik']=content::where('category_id',$cat->id)->where('status',1)->paginate(1);
           
            return view('front.categorydetay',$data);
    }


    public function sayfa($slug){
        $data['pages']=page::orderBy('order', 'asc')->get();
            $data['icerikler']=page::where('slug',$slug)->first() ?? abort(403,'Böyle bir data bulunamadı');

           
            return view('front.page',$data);
    }
    public function contact(){

        return view('front.contact');
    }
    public function contact2(){

        return view('front.contact2');
    }
    public function contactpost(Request $request){

        $rules=[
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'


        ];
        $validate=Validator::make($request->post(),$rules);

        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();//withErrors ile hataları sessiona atadık ve karşı tarafta yazdıracağız,withInput ile kullanıcının girmiş olduğu değerleri gönderdik
        }
        Mail::send([],[],function($message) use($request){
            $message->from('iletisim@blogsitesi.com','Blog Sitesi');
            $message->to('66fatihavci@gmail.com');
            $message->setBody('Mesajı Gönderen:'.$request->name.'<br/>
            Mesajı Gönderen Mail:'.$request->email.'<br/>
            Mesaj Konusu:'.$request->topic.'<br/>
            Mesaj:'.$request->message.'<br/><br/>
            Mesaj Gönderilme Tarihi:'.now().'','text/html');
            $message->subject($request->name.' iletişimden mesaj gönderdi');
        });
     /*  $contact= new contact;
       $contact->name=$request->name;
       $contact->email=$request->email;
       $contact->topic=$request->topic;
       $contact->message=$request->message;
       $contact->save(); */
      return redirect()->route('contact')->with('success','Mesajınız bize iletildi teşekkürler');
    }
     public function contactpost2(Request $request){

        $rules=[
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'


        ];
        $validate=Validator::make($request->post(),$rules);

        if($validate->fails()){
            return redirect()->route('contact2')->withErrors($validate)->withInput();//withErrors ile hataları sessiona atadık ve karşı tarafta yazdıracağız,withInput ile kullanıcının girmiş olduğu değerleri gönderdik
        }
        
       $contact= new testcontact;
       $contact->name=$request->name;
       $contact->email=$request->email;
       $contact->topic=$request->topic;
       $contact->message=$request->message;
       $contact->save();
      return redirect()->route('contact2')->with('success','Mesajınız bize iletildi teşekkürler');
    }
}
