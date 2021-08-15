@extends('front.layouts.master')
@section('content')
    @section('title')
    {{$kategoridetay->name}}
    @endsection
        <!-- Main Content-->
                @if(count($icerik)>0)
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($icerik as $i)
                    <div class="post-preview col-lg-12">
                        <a href="{{route('single',[$i->getCategory->slug,$i->slug])}}">
                            <h2 class="post-title">{{$i->title}}</h2>
                            <div class="row">
                            <img src="{{$i->image}}"  />
                        </div>
                            <h3 class="post-subtitle">{!! Str::limit($i->content,75) !!}</h3>
                        </a>
                        <p class="post-meta">Kategori : 
                          
                            <a href="#!">{{$i->getCategory->name}}</a><span style="float: right">{{$i->created_at->diffforHumans()}}</span>
                            
                        </p>
                    </div>
                    <!-- Divider-->
                    @if(!$loop->last)
                    <hr class="my-4" />
                    @endif
                    

                    @endforeach
                     {{ $icerik->links("pagination::bootstrap-4") }}
                    <!-- Post preview-->
                    
                    <!-- Divider-->
                   
                    <!-- Pager-->
                   
                </div>
                 @else
                 <div class="col-lg-8">Katagoriye ait yazı yok....</div>
                @endif

               @include('front.widgets.categorywidget')
         @endsection 
        <!-- Footer-->

