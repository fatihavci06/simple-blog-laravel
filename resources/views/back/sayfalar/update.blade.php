@extends('back.layouts.master')
@section('content')
    @section('title')
    {{$sayfa->title}}
    @endsection
  
   <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <!-- Page Heading -->
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                     @if($errors->any()) 
                        @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                        @endforeach
                    @endif
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                   <form method="post" class="form-group" action="{{route('sayfa.guncelle.post',$sayfa->id)}}" enctype="multipart/form-data"> 
                   
                    @csrf
                     
                    <div class="col-md-10 mt-2">
                    <div class="form-group">
                   
                       <label>Makele Başlığı</label>
                       <input type="text" name="title" value="{{$sayfa->title}}" required="required" class="form-control">
                       <input type="hidden" name="id" value="{{$sayfa->id}}"  class="form-control">
                     </div>
                      
                     <div class="form-group">
                   
                       <label>Sayfa Fotoğrafı</label><br/>
                       <img src="{{asset($sayfa->image)}}" class="img-thumbnail rounded" width="300"/>
                       <input type="file" name="image" class="form-control">
                     </div>

                     <div class="form-group">
                   
                       <label>Makele İçeriği</label>
                      <textarea id="summernote" name="icerik" rows="6" class="form-control">{{$sayfa->content}}</textarea>
                     </div>
                     <div class="form-group">
                   
                       <label>Status</label>
                        <select class="form-control" name="statu">
                            
                            <option value="0" @if($sayfa->status==0) selected @endif>Pasif </option>
                           <option value="1" @if($sayfa->status==1) selected @endif>Aktif </option>
                        </select>
                     </div>
                     <div class="form-group">
                   
                        <button class="btn btn-primary form-control">Sayfayı Güncelle</button>
                     </div>
                      </div>
                   </form>

                      
                </div>           
@endsection
