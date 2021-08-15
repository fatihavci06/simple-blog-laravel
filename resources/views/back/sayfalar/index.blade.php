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
                            <div class="row"><div class="col-lg-9"><h3>Sayfa Listesi</h3></div><h6 class="m-0 font-weight-bold text-primary"><strong>{{$page->count()}}</strong> adet sayfa bulundu

                               
                            </h6></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div  id="sonuc"></div>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sıralama</th>
                                             <th>Fotoğraf</th>
                                            <th>Sayfa Başlığı</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="15px;align-items:center;">Sıralama</th>
                                            <th>Fotoğraf</th>
                                            <th>Sayfa Başlığı</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                            
                                            
                                        
                                        </tr>
                                    </tfoot>
                                    <tbody id="orders">

                                        @foreach($page as $p)
                                        <tr id="sayfa_{{$p->id}}">
                                            <input type="hidden" id="_token" name="_token" value="{!! csrf_token() !!}">

                                            <td class="text-center"><i class="fa fa-arrows-alt-v fa-3x handle "></i></td>
                                            <td><img src="{{$p->image}}" width="150px"/></td>
                                            <td>{{$p->title}}</td>
                                            
                                            <td>@if($p->status==0)Pasif @else Aktif @endif</td>
                                            
                                            <td>
                                                <a href="{{route('pages.s',$p->slug)}}" class="btn btn-success" title="Görüntüle"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('sayfalar.duzenle',$p->id)}}" class="btn btn-primary" title="Düzenle"><i class="fa fa-pen"></i></a>
                                                <a  onclick="silmedenSor('{{route('sayfalar.sil',$p->id)}}')" class="btn btn-danger" title="Sil"><i class="fa fa-times"></i></a>

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
