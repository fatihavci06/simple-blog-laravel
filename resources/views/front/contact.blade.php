@extends('front.layouts.master')
@section('content')
    @section('title')
    {{'İletişim'}}
    @endsection
     @section('bg'){{'https://www.aselsan.com.tr/ed3964e8-c55d-4528-bf78-ed353de11e95.jpg'}}@endsection
   
        <!-- Main Content-->
        
                <div class=" col-lg-8 col-xl-7">
                    
                    @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                        @endforeach
                        </div>
                    @endif

                        
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <form  action="{{route('contact.post')}}" method="post" >
                                @csrf
                                <div class="control-group">
                                   
                                    <label for="name">Ad soyad</label>
                                     <input class="form-control" value="{{old('name')}}" name="name" type="text" placeholder="Ad ve soyadınız." />
                                   
                                </div>
                                <div class="control-group">
                                   
                                    <label for="name">Email adres</label>
                                     <input class="form-control" value="{{old('email')}}" name="email" type="text" placeholder="Email adresiniz"  />
                                   
                                </div>
                                <div >
                                   
                                    <label for="name">Konu</label>
                                     <select name="topic">
                                         <option @if(old('topic')=="Bilgi") selected @endif>Bilgi</option>
                                         <option @if(old('topic')=="Destek") selected @endif>Destek</option>
                                         <option @if(old('topic')=="Genel") selected @endif>Genel</option>
                                     </select>
                                   
                                </div>
                                
                                <div class="control-group controls">
                                    <label for="message">Mesajınız</label>
                                    <textarea class="form-control" name="message" placeholder="Mesajınız..." style="height: 12rem" >
                                        {{old('message')}}
                                    </textarea>
                                    
                                </div>
                                <br />
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        To activate this form, sign up at
                                        <br />
                                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
                            </form>
                      
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-default">
                            <div class="card-body">dasda</div>
                        </div>
                    </div>
            
                
         @endsection 
        <!-- Footer-->

