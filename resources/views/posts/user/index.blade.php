@extends('layouts.plantilla')

@section("content")
<div class="container text-light">
	<div class="row">
		<div class="col-2 p-3"><a class="btn btn-outline-secondary" href="{{route('post.create')}}">Crear post</a></div>
	</div>


<div class="row py-4">
        @if(count($posts)>0)
        @include('layouts.postsPlantilla')
        @else


        <div  class="col-lg-2 col-md-4 col-sm-6 col-xs-12 p-2 py-3 zoom">
    <div class="card fondo-menu radius zoom2 text-center">
  <div class="card-body ">

    <h1 class="badge" style="font-size:15px">Aqui Iran Tus Post</h1> 
 <img src="{{asset('img')}}/22_21_26_foto-default.png" class="radius img-fluid estilo-foto">
  </div>
</div>
        
    </div>
@endif

</div>
    @if(Session::has('destroySusses'))

        {{session('destroySusses')}}
    @endif
</div>
@endsection
@section('pie')
@include('layouts.pie')
@endsection