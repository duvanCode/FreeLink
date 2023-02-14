@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("content")
	<div class="container text-light padding-lr">
		<div class="row justify-content-center text-light">
		<div class="card fondo-menu fondo-menu col-md-8 ">
			<div class="card-header">
    Actualizar Usuario
  </div>
  <div class="card-body">
			{!! Form::model($user, ['route' => ['profile.update', $user->id],'files'=>true,'method'=>'PATCH'])!!}
			 @csrf
			<div class="row">

		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('nombre', 'Nombre',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-md-6">
			{!!Form::text('name',null,['class'=>'rounded form-control']);!!}
			</div>
		</div>
		@error('name')
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"></label>
                <div class="col-md-6">   
                   <div class="py-2 my-0 alert alert-danger">{{ $message }}</div>
                </div>
            </div>
        @enderror
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('mail', 'Direccion de correo',['class'=>'m-1']);!!}</p>
		</div>
		<div class="col-md-6">
			{!!Form::email('email',null,['class'=>'rounded form-control']);!!}
			</div>
		</div>
		@error('email')
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"></label>
                <div class="col-md-6">   
                   <div class="py-2 my-0 alert alert-danger">{{ $message }}</div>
                </div>
            </div>
        @enderror
		<div class="row">
			<div class="col-3 col-md-4 col-form-label text-md-end">
			<p class="">{!!Form::label('foto_id', 'Foto',['class'=>'col-md-4 col-form-label text-md-end']);!!}</p>
		</div>
		<div class="col-md-6">
			{!!Form::file('foto_id',['class'=>'custom-file-input form-control']);!!}
			</div>
		</div>
		@error('foto_id')
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end"></label>
                <div class="col-md-6">   
                   <div class="py-2 my-0 alert alert-danger">{{ $message }}</div>
                </div>
            </div>
        @enderror
		<div class="row">
			<div class="col-4">
			<p class=""></p>
		</div>
		<div class="col-4">
			{!!Form::submit('Enviar',['class'=>'btn btn-outline-secondary my-2 my-sm-0 m-1']);!!}
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