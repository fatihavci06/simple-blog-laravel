@extends('front.layouts.master')
@section('content')
    @section('title')
    {{$icerik->title}}
    @endsection
     @section('bg'){{$icerik->image}}@endsection
   
        <!-- Main Content-->
        
                <div class="col-md-10 col-lg-8 col-xl-7">
                       
                    {!!$icerik->content!!}
                    <br/>
                    <span class="text-danger">Okunma sayısı: <b>{{$icerik->hit}}</b> </span>


                            
                    
                </div>
            
                @include('front.widgets.categorywidget')
         @endsection 
        <!-- Footer-->

