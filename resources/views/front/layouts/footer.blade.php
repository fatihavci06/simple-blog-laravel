        </div>
    </div>
       <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            @php $sosyal=['facebook','twitter','instagram','github','youtube','linkedin'] @endphp
                            @foreach($sosyal as $s)
                            @if($ayarlar->$s!='')
                            <li class="list-inline-item">
                                <a href="{{$ayarlar->$s}}" target="_blank">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-{{$s}} fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            @endif
                            @endforeach
                            
                            
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; {{$ayarlar->title}} - {{date('Y')}}</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('front/')}}js/scripts.js"></script>
    </body>
</html>
