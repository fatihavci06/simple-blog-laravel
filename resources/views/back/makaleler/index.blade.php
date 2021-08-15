@extends('back.layouts.master')
@section('content')
    @section('title')
    Makale Listesi
    @endsection
    <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row"><div class="col-lg-9"><h3>Makale Listesi</h3></div><h6 class="m-0 font-weight-bold text-primary"><strong>{{$contents->count()}}</strong> adet makale bulundu

                                <a href="{{route('delete.makale')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i>Silinen Makaleler</a>
                            </h6></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Makale Başlığı</th>
                                            <th>Kategori</th>
                                            <th>Görüntülenme Sayısı</th>
                                            <th>Oluşturulma Tarihi</th>
                                            
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Makale Başlığı</th>
                                            <th>Kategori</th>
                                            <th>Görüntülenme Sayısı</th>
                                            <th>Oluşturulma Tarihi</th>
                                            
                                            <th>İşlemler</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach($contents as $c)
                                        <tr>
                                            <td><img src="{{$c->image}}" width="150px"/></td>
                                            <td>{{$c->title}}</td>
                                            <td>{{$c->getCategory['name']}}</td>
                                            <td>{{$c->hit}}</td>
                                            <td>{{$c->created_at->diffForHumans()}}</td>
                                            
                                            <td>
                                                <a href="{{route('single',[$c->getCategory->slug,$c->slug])}}" class="btn btn-success" title="Görüntüle"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('makale.edit',$c->id)}}" class="btn btn-primary" title="Düzenle"><i class="fa fa-pen"></i></a>
                                                <a  onclick="silmedenSor('{{route('makale.sil',$c->id)}}')" class="btn btn-danger" title="Sil"><i class="fa fa-times"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection
