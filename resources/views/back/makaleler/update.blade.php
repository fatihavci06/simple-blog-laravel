@extends('back.layouts.master')
@section('content')
    @section('title')
    {{$makale->title}}
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
                   <form method="post" class="form-group" action="{{route('makale.update',$makale->id)}}" enctype="multipart/form-data"> 
                   
                    @csrf
                     
                    <div class="col-md-10 mt-2">
                    <div class="form-group">
                   
                       <label>Makele Başlığı</label>
                       <input type="text" name="title" value="{{$makale->title}}" required="required" class="form-control">
                     </div>
                      <div class="form-group">
                   
                       <label>Kategori</label>
                        <select class="form-control" name="category">
                            <option value="">Seçim yapınız</option>
                            @foreach($kategoriler as $k)

                            <option value="{{$k->id}}" @if($makale->category_id==$k->id) selected @endif>{{$k->name}}</option>
                            @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                   
                       <label>Makele Fotoğrafı</label><br/>
                       <img src="{{asset($makale->image)}}" class="img-thumbnail rounded" width="300"/>
                       <input type="file" name="image" class="form-control">
                     </div>
                     <div class="form-group">
                   
                       <label>Makele İçeriği</label>
                      <textarea id="summernote" name="icerik" rows="6" class="form-control">{{$makale->content}}</textarea>
                     </div>
                     <div class="form-group">
                   
                       <label>Status</label>
                        <select class="form-control" name="statu">
                            
                            <option value="0" @if($makale->status==0) selected @endif>Pasif </option>
                           <option value="1" @if($makale->status==1) selected @endif>Aktif </option>
                        </select>
                     </div>
                     <div class="form-group">
                   
                        <button class="btn btn-primary form-control">Makaleyi Güncelle</button>
                     </div>
                      </div>
                   </form>

                      
                </div>           
@endsection
