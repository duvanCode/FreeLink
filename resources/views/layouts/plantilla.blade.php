<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FreeLink</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <style type="text/css">
    	
    	.fondo-menu
    	{
    		background:#262626;
    	}
    	.imagen
    	{
    		width: 20%;
    	}
    	.padding-lr
    	{
    		padding:1em;
    	}
    	.padding-lf
    	{
    		padding: 1em 0;
    	}
    	.display{
    		display: flex;
    		width: auto;
    	}
    	.radius
    	{
    		border-radius: 30px 30px 30px 30px;
    	}
    	.radius-t
    	{
    		border-radius: 0px 0px 10px 10px;
    	}
    	body
    	{
    		background:#131313;
    	}
        .botton-abajo
        {
            position:relative;
            top:50%;
        }
        .zoom {
            transition: transform .2s; 
        }
 
        .zoom:hover {
            transform: scale(1.1);
        }
        .zoom2 {
            transition: transform .2s; 
        }
 
        .zoom2:hover {
            background:#2c2c2c;
        }
        .estilo-foto
        {
            height:19em;
            width:13em;
        }
        .estilo-foto2
        {
            height:11em;
            width:13em;
        }
        .p-d
        {
            padding: 9em 0;
        }
        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }
        .color:hover
        {
            background:#262626;
        }
        .pagination li.active .page-link,
.pagination li .page-link:hover {
  background: #262626;
}
.pagination li .page-link {
    background:#262626;
    color:;
    border-color:#4C4C4C;
}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-static navbar-dark fixed-top fondo-menu shadow-sm radius-t">
            <div class="container">
                <a class="navbar-brand padding-lr" href="{{url('/')}}">
    <img src="{{ asset('img/loG/logo.png')}}" width="30" height="30" alt="">
  </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    	<li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link " href="{{asset('/')}}">Inicio</a></div>
                                </li>
                                <li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link " href="{{route('about')}}">Nosotros</a></div>
                                </li>
                               
                                
                                @auth
                               
                                <li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link " href="{{route('profile.index')}}">Perfil</a></div>
                                </li>
                                <li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link " href="{{route('post.index')}}">Posts</a></div>
                                </li>
                                @endauth
                                @auth('admin')
                               
                                <li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link " href="{{route('user.index')}}">Administrador</a></div>
                                </li>
                                @endauth
                                 @guest
                                @endguest
                                <li class="nav-item">
                                    <form class="form-inline mt-2 mt-md-0 display" action="{{route('buscar')}}">
          <div class="padding-lr"><input class="form-control mr-sm-2" type="text" name="consulta" placeholder="Buscar" aria-label="Search"></div>
          <div class="padding-lf"><button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button></div>
        </form>
                                </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></div>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <div class="padding-lr"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></div>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-d">
            @yield('content')
        </main>
    </div>
@yield('pie')

</body>
</html>
