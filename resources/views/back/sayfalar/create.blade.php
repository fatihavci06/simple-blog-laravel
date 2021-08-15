@extends('back.layouts.master')
@section('content')
    @section('title')
    Makale Oluştur
    @endsection
  
   <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    <!-- Page Heading -->
                   @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
                     @if($errors->any()) 
                        @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                        @endforeach
                    @endif
                   <form method="post" class="form-group" action="{{route('sayfa.yeni.post')}}" enctype="multipart/form-data"> 
                    @csrf
                    <div class="col-md-10 mt-2">
                    <div class="form-group">
                   
                       <label>Sayfa Başlığı</label>
                       <input type="text" name="title" value="{{old('title')}}" required="required" class="form-control">
                     </div>
                      
                     <div class="form-group">
                   
                       <label>Sayfa Fotoğrafı</label>
                       <input type="file" name="image" required="required" class="form-control">
                     </div>
                     <div class="form-group">
                   
                       <label>Sayfa İçeriği</label>
                      <textarea id="summernote" name="icerik" rows="6" class="form-control">{{old('icerik')}}</textarea>
                     </div>
                      <div class="form-group">
                   
                       <label>Status</label>
                        <select class="form-control" name="statu">
                            <option value="" >Seçiniz </option>
                            <option value="1" >Aktif </option>
                            <option value="0" >Pasif </option>
                           
                        </select>
                     </div>
                     <div class="form-group">
                   
                        <button class="btn btn-primary form-control">Makale Oluştur</button>
                     </div>
                      </div>
                   </form>

                      
                </div>           
@endsection
