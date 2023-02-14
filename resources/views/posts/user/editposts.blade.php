@extends('layouts.plantilla')

@section("content")
<div class="container">
	<div class="row justify-content-center text-light">
		
            <div class="card fondo-menu col-md-8">
                <div class="card-header">Editar post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.update', $posts->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Titulo</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" value="{{old('title',$posts->title)}}" name="title">
                            </div>
                        </div>

                        @error('title')
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">   
                                <div class="py-2 my-0 alert alert-danger">{{ $message }}</div>
                            </div>
                        </div>
                        @enderror

                        <div class="row mb-3">
                            <label for="link" class="col-md-4 col-form-label text-md-end">Link</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control " value="{{old('link',$posts->link)}}" name="link">
                            </div>
                        </div>
                        @error('link')
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">   
                                <div class="py-2 my-0 alert alert-danger">{{ $message }}</div>
                            </div>
                        </div>
                        @enderror

                        <div class="row mb-3 ">
                            <label for="contenido" class="col-md-4 col-form-label text-md-end">Contenido</label>

                            <div class="col-md-6">
                                <input id="contenido" type="text" class="form-control padding-lr" value="{{old('contenido',$posts->contenido)}}" name="contenido">
                            </div>
                        </div>
                        @error('contenido')
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">   
                                <div class="py-2 my-0 alert alert-danger">{{ $message }}</div>
                            </div>
                        </div>
                        @enderror
                        <div class="row mb-3 ">
                            <label class="col-md-4 col-form-label text-md-end" for="customFileLang">Seleccionar Foto</label>

                            <div class="col-md-6">
                                <input type="file" class="custom-file-input form-control" id="foto_id" name="foto_id" lang="es">
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


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-secondary my-2 my-sm-0 m-1">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		
	</div>

</div>
@endsection