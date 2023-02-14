<div class="row py-4">
        
        @foreach($posts as $post)
    <div  class="col-lg-2 col-md-4 col-sm-6 col-xs-12 p-2 py-3 zoom">
        <a style="text-decoration:none;" href="{{route('nor.show',$post->id)}}">
        <div class="card fondo-menu radius zoom2 text-center">
            <div class="card-body ">
                <h1 class="text-light" style="font-size:15px">{{$post->title}}</h1> 
                <img src="{{asset('img')}}/{{$post->foto->foto_ruta}}" class="radius img-fluid estilo-foto">
            </div>
        </div>
            
        </a>
    </div>
        @endforeach
       
    </div>