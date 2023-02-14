@extends('layouts.plantilla')

@section("content")
<div class="container">
	<div class="row justify-content-center text-light">
		
            <div class="card fondo-menu col-md-8">
                <div class="card-header">Create post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Titulo</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control " name="title" value="{{old('title')}}">
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
                                <input id="link" type="text" class="form-control " name="link" value="{{old('link')}}">
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
                                <input id="contenido" type="text" class="form-control padding-lr" name="contenido" value="{{old('contenido')}}">
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
                                <input type="file" class="custom-file-input form-control" id="foto_archivo" name="foto_archivo" lang="es" value="{{old('foto_archivo')}}">
                            </div>
                        </div>
                        @error('foto_archivo')
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
                                    {{ __('Crear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		
	</div>

</div>
@endsection