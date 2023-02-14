@extends("layouts.plantilla")

@section("content")
	<div class="container text-light">
		<div class="row fondo-menu py-4 radius">
			<img src="{{asset('/img')}}/{{$user->foto->foto_ruta}}" class="estilo-foto2 rounded-circle">
			<div class="col-3">
				<h4 class="py-1">Nombre: {{$user->name}}</h4>
				<h4 class="py-1">Rol: {{$user->role->rolDeUsuario}}</h4>
				<h4 class="py-1">Correo: {{$user->email}}</h4>
			</div>
			<div class="col-6">
				<a class="btn btn-outline-secondary" href="{{route('profile.edit',$user->id)}}">Editar Perfil</a>
			</div>
		</div>
		<div class="row py-4">
			<h4 class="py-4">Mis post</h4>
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

        @endif
    </div>
	</div>
@endsection

@section("pie")
@include('layouts.pie')
@endsection 