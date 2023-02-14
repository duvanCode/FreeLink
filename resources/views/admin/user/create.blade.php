@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("content")
	<div class="container text-light padding-lr">
		<div class="row justify-content-center text-light">
		<div class="card fondo-menu fondo-menu col-md-8 ">
			<div class="card-header">
    Ingresar Usuarios
  </div>
  <div class="card-body">
			{!! Form::open(['method'=>'POST','route'=>'user.store','files' => true])!!}
			 @csrf
			<div class="row">
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('rol', 'Rol',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-4">
			{!!Form::text('role_id',null,['class'=>'rounded form-control']);!!}
			</div>
		</div>
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('nombre', 'Nombre',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-4">
			{!!Form::text('name',null,['class'=>'rounded form-control']);!!}
			</div>
		</div>
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('mail', 'Direccion de correo',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-4">
			{!!Form::email('email',null,['class'=>'rounded form-control']);!!}
			</div>
		</div>
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('password', 'Contraseña',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-4">
			{!!Form::password('password',['class'=>'rounded form-control']);!!}
			</div>
		</div>
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('foto_id', 'Foto',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-4">
			{!!Form::file('foto_id',['class'=>'m-1']);!!}
			</div>
		</div>

		<div class="row">
			<div class="col-4">
			<p class=""></p>
		</div>
		<div class="col-4">
			{!!Form::submit('Enviar',['class'=>'btn btn-outline-secondary my-2 my-sm-0 m-1']);!!}
			{!!Form::reset('Borrar',['class'=>'btn btn-outline-secondary my-2 my-sm-0 m-1']);!!}
			</div>
		</div>
		
			</div>
			{!! Form::close() !!}
</div>
		</div>
		</div>
	</div>
@endsection

@section("pie")

@endsection