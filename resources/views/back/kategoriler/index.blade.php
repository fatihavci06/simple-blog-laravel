@extends('back.layouts.master')
@section('content')
    @section('title')
    Kategori Listesi
    @endsection
                     @if($errors->any()) 
                                @foreach($errors->all() as $e)
                                <div class="danger">
                                <li>{{$e}}</li>
                            </div>
                                @endforeach
                            @endif
    <div class="row ml-2 mr-2">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('categories.ekle')}}">
                          
                        @csrf
                        <div class="form-group">
                            <label>Kategori Adı</label>
                            <input type="text" class="form-control" name="category" value="{{old('category')}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="">Seçiniz</option>
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block btn-sm float-right">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">@yield('title')</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Makale Sayısı</th>
                                            <th>Durum</th>                                           
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Makale Sayısı</th>
                                            <th>Durum</th>                                           
                                            <th>İşlemler</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach($categories as $c)
                                        <tr>
                                            
                                            <td>{{$c->name}}</td>
                                            <td>{{$c->contentcount()}}</td>
                                            <td>@if($c->status==0) Pasif @else Aktif @endif</td>
                                        
                                            
                                            <td>
                                                
                                                <a  data-id="{{$c->id}}" class="btn btn-primary editk"  title="Düzenle"><i class="fa fa-pen"></i></a>
                                                <a  onclick="silmedenSor('{{route('kategori.sil',$c->id)}}',{{$c->contentcount()}})"  class="btn btn-danger" title="Sil"><i class="fa fa-times"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>


<!-- Modal -->

            </div>
        </div>
    </div>
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Kategoriyi Düzenle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('category.guncelle.post')}}">
            @csrf
            <div class="form-group">
                <label>Kategori Adı</label>
                <input id="category" name="category" value="" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label>Kategori Slug</label>
                <input id="slug" name="slug" type="text"  value="" class="form-control" />
                <input id="category_id" name="category_id" type="hidden" class="form-control" />
            </div>
            <div class="form-group">
                            <label>Durum</label>
                            <select class="form-control" name="status">
                                <option value="">Seçiniz</option>
                                <option value="1">Aktif</option>
                                <option value="0">Pasif</option>
                            </select>
                        </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        <button type="submit"  class="btn btn-primary">Kaydet</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
@endsection
