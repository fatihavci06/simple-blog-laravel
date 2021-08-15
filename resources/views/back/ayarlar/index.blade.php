@extends('back.layouts.master')
@section('content')
    @section('title')
    Ayarlar
    @endsection
    <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-6">
                        <div class="card-header py-3">
                            <div class="row"><div class="col-lg-9"><h3>Ayarlar</h3></div></div>
                        </div>
                        @if(session('success'))
	                    <div class="alert alert-success">{{session('success')}}</div>
	                    @endif
	                    @if($errors->any()) //bu şekilde hatalar yakalanır kural bu
	                        @foreach($errors->all() as $e)
	                        <li>{{$e}}</li>
	                        @endforeach
	                    @endif
                        <form method="post" class="form-group" action="{{route('ayar.guncelle.post')}}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="col-md-12 mt-2">
                    <div class="form-group col-lg-6">
                   
                       <label>Site Başlığı</label>
                       <input type="text" name="title" value="{{$ayarlar->title}}" required="required" class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Aktiflik durumu</label>
                       <select name="status" class="form-control">
                       	<option value="">Seçim yapınız</option>
                       	<option value="1" @if($ayarlar->active==1){{'selected'}}  @endif>Aktif</option>
                       	<option value="0" @if($ayarlar->active==0){{'selected'}}  @endif>Pasif</option>
                       </select>
                       
                     </div>
                      
                     <div class="form-group col-lg-6">
                   
                       <label>Logo</label>
                       <input type="file" name="logo"  class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Favicon</label>
                       <input type="file" name="favicon"  class="form-control">
                     </div>

                     <div class="form-group col-lg-6">
                   
                       <label>Facebook</label>
                       <input type="text" name="facebook" value="{{$ayarlar->facebook}}"  class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Twitter</label>
                       <input type="text" name="twitter" value="{{$ayarlar->twitter}}"  class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Instagram</label>
                       <input type="text" name="instagram" value="{{$ayarlar->instagram}}" class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Github</label>
                       <input type="text" name="github" value="{{$ayarlar->github}}" class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Linkedin</label>
                       <input type="text" name="linkedin" value="{{$ayarlar->linkedin}}" class="form-control">
                     </div>
                     <div class="form-group col-lg-6">
                   
                       <label>Youtube</label>
                       <input type="text" name="youtube" value="{{$ayarlar->youtube}}" class="form-control">
                     </div>

                     
                      
                     <div class="form-group col-lg-6">
                   
                        <button class="btn btn-primary form-control">Güncelle</button>
                     </div>
                      </div>
                   </form>

                    </div>

                </div>
@endsection
