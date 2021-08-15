@extends('front.layouts.master')
@section('content')
    @section('title')
    Anasayfa
    @endsection
        <!-- Main Content-->

                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($icerik as $i)
                    <div class="row post-preview">

                        <a href="{{route('single',[$i->getCategory->slug,$i->slug])}}">
                            <h2 class="post-title">{{$i->title}}</h2>
                            <div class="row">
                                <img src="{{$i->image}}"  />
                             </div>
                            <h3 class="post-subtitle">{!! Str::limit($i->content,75)!!}</h3>
                        </a>
                        <p class="post-meta">Kategori : 
                          
                            <a href="#!">{{$i->getCategory['name']}}</a><span style="float: right">{{$i->created_at->diffforHumans()}}</span>
                            
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
                @include('front.widgets.categorywidget')

         @endsection 

        <!-- Footer-->

