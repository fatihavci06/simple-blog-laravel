@extends('front.layouts.master')
@section('content')
    @section('title')
    {{$icerikler->title}}
    @endsection
     @section('bg'){{$icerikler->image}}@endsection
   
        <!-- Main Content-->
        
                <div class="col-md-10 col-lg-8 col-xl-7">
                       {!!$icerikler->content!!}
                    </div>
            
               
         @endsection 
        <!-- Footer-->

