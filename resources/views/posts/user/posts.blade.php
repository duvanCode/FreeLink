@extends('layouts.plantilla')

@section('content')
<div class="container">
	<script type="text/javascript">
	function confirmClick()
	{
		if(confirm('ELIMINAR POST'))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
</script>
	@foreach($posts as $post)
	<div class="row justify-content-center">
		<div class="col-md-5">
	<div class="card text-light fondo-menu text-white mb-3">
  <div class="card-header ">{{$post->title}}</div>
  <div class="card-body text-center">
  	 <img src="{{asset('img')}}/{{$post->foto->foto_ruta}}" class="radius img-fluid estilo-foto">
    <p class="">{{$post->contenido}}</p>
    
    {!!Form::model($post, ['route' => ['post.destroy', $post->id],'method' => 'delete'])!!}
    
    <a href="{{$post->link}}" class="btn btn-outline-success p-2 m-1">Link</a>
    @auth('mypost')
    <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-secondary m-1 p-2">Editar</a>
		{!!Form::submit('Borrar',['class'=>'btn btn-outline-secondary m-1 p-2','onclick' => 'return confirmClick()']);!!}
		@endauth
		{!! Form::close() !!}
  </div>
  	</div>
  	</div>
  	</div>
	@endforeach
	<div class="row py-4">
		@include('layouts.postsPlantilla2')
	</div>
</div>
@endsection

@section('pie')}
@include('layouts.pie')
@endsection