@extends("layouts.plantilla")

@section("cabecera")

@endsection

@section("content")
<script type="text/javascript">
	function confirmClick()
	{
		if(confirm('ELIMINAR USUARIO'))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
</script>
<div class="container">
<table class="table rounded padding-lr fondo-menu text-light  table-responsive">
	<thead>
		<tr>
		<th class="col-1 border-bottom"><b>id</b></th>
		<th class="col-2 border-bottom"><b>Foto</b></th>
		<th class="col-1 border-bottom"><b>Rol</b></th>
		<th class="col-2 border-bottom"><b>Nombre</b></th>
		<th class="col-2 border-bottom"><b>Correo</b></th>
		<th class="col-1 border-bottom"><b>Creado</b></th>
		<th class="col-1 border-bottom"><b>Actualizado</b></th>
		<th class="col-1 border-bottom"><b>Editar</b></th>
		<th class="col-1 border-bottom"><b>Borrar</b></th>
		</tr>
		</thead>
	@foreach($users as $user)
	<tbody>
		<tr>
	<td class="col-1 border-bottom p-1">{{$user->id}}</td>
	@if($user->foto)
	<td class="col-2 border-bottom"><img src="http://homestead.test/img/{{$user->foto->foto_ruta}}" class="imagen rounded-circle" /></td>
	@else
	<td class="col-2 border-bottom p-1">No hay foto</td>
	@endif

	<td class="col-1 border-bottom p-1">{{$user->role->rolDeUsuario}}</td>
	<td class="col-2 border-bottom p-1">{{$user->name}}</td>
	<td class="col-2 border-bottom p-1">{{$user->email}}</td>
	<td class="col-1 border-bottom p-1">{{$user->created_at}}</td>
	<td class="col-1 border-bottom p-1">{{$user->updated_at}}</td>
	<td class="col-1 border-bottom p-1"><a href="{{route('user.edit',$user->id)}}" class="btn btn-secondary">Editar</a></td>
	<td class="col-1 border-bottom p-1">{!!Form::model($user, ['route' => ['user.destroy', $user->id],'method' => 'delete'])!!}
		{!!Form::submit('Borrar',['class'=>'btn btn-secondary','onclick' => 'return confirmClick()']);!!}
		{!! Form::close() !!}
	</td>
	@endforeach
	</tr>
	</tbody>
</table>
</div>

@endsection

@section("pie")

@endsection