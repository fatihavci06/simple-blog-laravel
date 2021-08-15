<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Makalecontroller;
//kategoriler
  Route::get('admin/cikis','App\Http\Controllers\Back\Auths@logout')->name('logout');
Route::get('admin/kategoriler/sil/{id?}','App\Http\Controllers\Back\CategoryController@sil')->middleware('buadminmi')->name('kategori.sil');
Route::get('admin/kategoriler/liste','App\Http\Controllers\Back\CategoryController@index')->middleware('buadminmi')->name('kategori.liste');
Route::post('admin/kategoriler/ekle','App\Http\Controllers\Back\CategoryController@ekle')->middleware('buadminmi')->name('categories.ekle');
Route::post('admin/kategoriler/kategoricek','App\Http\Controllers\Back\CategoryController@kategoricek')->middleware('buadminmi')->name('category.get');
Route::post('admin/kategoriler/kategoriguncelle','App\Http\Controllers\Back\CategoryController@kategoriguncelle')->middleware('buadminmi')->name('category.guncelle.post');
// back route
    Route::get('admin/giris','App\Http\Controllers\Back\Auths@login')->middleware('loginmi')->name('admin.login');
    Route::post('admin/giris','App\Http\Controllers\Back\Auths@loginpost')->name('admin.login.post');
    Route::post('admin/makaleler/guncelle/{id}','App\Http\Controllers\Back\Makalecontroller@update')->name('makale.update');
    Route::get('admin/makaleler/yeni','App\Http\Controllers\Back\Makalecontroller@create')->middleware('buadminmi')->name('makale.yeni');
    Route::post('admin/makaleler/yenipost','App\Http\Controllers\Back\Makalecontroller@store')->name('makale.yeni.post');
    Route::get('admin/makaleler/guncelle/{id?}','App\Http\Controllers\Back\Makalecontroller@edit')->middleware('buadminmi')->name('makale.edit');
     Route::get('admin/makaleler/silinenler','App\Http\Controllers\Back\Makalecontroller@trashed')->middleware('buadminmi')->name('delete.makale');
    Route::get('admin/makaleler/sil/{id?}','App\Http\Controllers\Back\Makalecontroller@destroy')->middleware('buadminmi')->name('makale.sil');
     Route::get('admin/makaleler/kalicisil/{id?}','App\Http\Controllers\Back\Makalecontroller@harddelete')->middleware('buadminmi')->name('kalici.makale.sil');
    Route::get('admin/makaleler/geriyukle/{id?}','App\Http\Controllers\Back\Makalecontroller@recover')->middleware('buadminmi')->name('makale.geriyukle');
    Route::get('admin/makaleler/liste','App\Http\Controllers\Back\Makalecontroller@index')->name('back.makaleler.index');
     Route::get('admin/makaleler/switch','App\Http\Controllers\Back\Makalecontroller@switch')->name('back.makaleler.switch');

Route::prefix('admin')->name('admin.')->middleware('buadminmi')->group(function(){  // örneğin admin/ yerine prefix tanımlayarak admin/ eklemedik aynı şey oldu. aynı şekilde name içinde admin.dashbord diye yazmadım admin. yı grup olarak tanımladım bitti :D

    Route::get('panel','App\Http\Controllers\Back\Dashboard@index')->name('panel');
   
  
  Route::resource('makaleler', Makalecontroller::class)->shallow();


});

//sayfalar

Route::get('/sayfalar','App\Http\Controllers\Back\sayfacontroller@index')->middleware('buadminmi')->name('sayfalar.index');
Route::get('/sayfalar/sil/{id}','App\Http\Controllers\Back\sayfacontroller@sil')->middleware('buadminmi')->name('sayfalar.sil');
Route::get('/sayfalar/duzenle/{id}','App\Http\Controllers\Back\sayfacontroller@duzenle')->name('sayfalar.duzenle');

 Route::get('admin/sayfalar/yeni','App\Http\Controllers\Back\sayfacontroller@create')->middleware('buadminmi')->name('sayfa.yeni');
 Route::post('admin/sayfalar/yeni/post','App\Http\Controllers\Back\sayfacontroller@insert')->middleware('buadminmi')->name('sayfa.yeni.post');
  Route::post('admin/sayfalar/guncelle/post','App\Http\Controllers\Back\sayfacontroller@sayfaguncelle')->middleware('buadminmi')->name('sayfa.guncelle.post');
   Route::get('admin/sayfalar/siralama','App\Http\Controllers\Back\sayfacontroller@siralama')->middleware('buadminmi')->name('admin.page.siralama');

  Route::get('admin/ayarlar','App\Http\Controllers\Back\AyarlarController@index')->middleware('buadminmi')->name('ayarlar');
  Route::post('admin/ayarguncelle','App\Http\Controllers\Back\AyarlarController@guncelle')->middleware('buadminmi')->name('ayar.guncelle.post');

  Route::get('site-bakimda',function(){
    return view('front.test');
  });
/*
|--------------------------------------------------------------------------
Front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::get('/iletisim2','App\Http\Controllers\Front\Homepage@contact2')->name('contact2');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::post('/iletisim2','App\Http\Controllers\Front\Homepage@contactpost2')->name('contact.post2');
Route::get('/detay/{id?}','App\Http\Controllers\Front\Homepage@detay');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{slug}','App\Http\Controllers\Front\Homepage@sayfa')->name('pages.s');
Route::get('/{category?}/{slug?}','App\Http\Controllers\Front\Homepage@single')->name('single');



