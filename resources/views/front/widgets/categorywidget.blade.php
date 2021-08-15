  @isset($categories)
    <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Kategoriler
                    </div>
                    <ul class="list-group">

                @foreach($categories as $category)
                  <li class="list-group-item <?php if(Request::segment(2)==$category->slug){ echo 'active';} ?>" ><a href="{{route('category',$category->slug)}}">
                      {{$category->name}}
                  </a><span class="badge badge-primary badge-pill bg-success float-right" >{{$category->contentcount()}}</span>
                  
                </li>
                @endforeach
                  
                </ul>
                </div>
                
          </div>
@endisset