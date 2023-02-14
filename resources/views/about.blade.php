@extends('layouts.plantilla')

@section('content')
	<div class="container">
		
		<div class="row fondo-menu radius">        

        <div class="col-5 padding-lr">
            <img src="http://homestead.test/img/loG/logo.png" class="imagen mx-5 my-3 rounded mx-auto d-block">
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

    <div class="row fondo-menu radius my-4 p-4">
    <div class="row py-4 text-light">
    	<div class="col-12">
    		<h1>Nosotros</h1>
    		&nbsp;
    	</div>
    	<div class="col">
    		<h5>¡Bienvenidos a FreeLink nuestra plataforma de películas gratuitas!</h5>
    		<h5 class="text-justify">En nuestra página web, ofrecemos una amplia variedad de películas de todos los géneros y para todas las edades. Nuestra misión es brindar acceso gratuito a películas de alta calidad a través de una plataforma en línea fácil de usar y accesible para todos.</h5>
    		&nbsp;
    	</div>
    </div>
     <div class="row text-light">
    	<div class="col-12">
    		<h1>Misión</h1>
    		&nbsp;
    	</div>
    	<div class="col">
    		<h5 class="text-justify">"Brindar acceso gratuito a películas de alta calidad a través de una plataforma en línea fácil de usar y accesible para todos. Promovemos la diversidad y la inclusión en nuestra selección de películas, y trabajamos constantemente para mejorar nuestros servicios y ampliar nuestra oferta de contenido gratuito."</h5>
    		&nbsp;
    	</div>
    </div>
     <div class="row py-4 text-light">
    	<div class="col-12">
    		<h1>Visión</h1>
    		&nbsp;
    	</div>
    	<div class="col">
    		<h5 class="text-justify">"Ser líderes en la industria del entretenimiento, ofreciendo una amplia variedad de películas gratuitas de alta calidad para satisfacer las necesidades de un público diverso y global."</h5>
    	</div>
    </div>
    </div>

	</div>
@endsection
@section('pie')
@include('layouts.pie')
@endsection