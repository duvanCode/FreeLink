@extends('layouts.plantilla')
@section('content')
<div class="container text-light">

    @if(count($posts) > 0)

    <div class="row fondo-menu radius">        

        <div class="col-5 padding-lr">
            <img src="{{asset('img/loG/logo.png')}}" class="imagen mx-5 my-3 rounded mx-auto d-block">
        </div>

        <div class="col-6 padding-lr">
            <h5 class="text-light botton-abajo">Comparte series, películas y videos de manera segura y sin pagar por ello.</h5>
        </div>
    

    <div class="col-5">
    <h1 class="text-light mx-5 my-3 text-center">FreeLink</h1>
    </div>
        <div class="col">
               
        </div>

    </div>

    @if(Session::has('AccessD'))

        <div class="row"><h5 class="text-light botton-abajo">Acceso Denegado</h5></div>
    @endif

    @include('layouts.postsPlantilla')

    <div class="row navbar-center">
 {{ $posts->links() }}
    </div>
</div>
@else
    <div class="text-light py-5"><h1>Lo siento, al parecer no pudimos encontar lo que buscas.</h1></div>
    <div class="py-5"></div>
    &nbsp;
@endif
@endsection


@section('pie')
@include('layouts.pie')
@endsection

