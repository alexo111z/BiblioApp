<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Biblio App</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
           <div class="container-fluid">
               <div class="navbar-header">
                   <a class="navbar-brand" href="#">
                       <img src="{{ asset('images/LogoTec.png') }}"/>
                       Biblio App ®
                   </a>
               </div>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="nav navbar-nav navbar-right">
                       @guest
                           <li>
                               <a href="{{ route('login') }}">Iniciar sesión<span class="sr-only">(current)</span></a>
                           </li>
                       @else
                           @if (Auth::user()->user_type === \App\User::TYPE_ADMIN || Auth::user()->user_type === \App\User::TYPE_COLLABORATOR)
                               <li>
                                   <a href="{{ route('home') }}">Panel de control<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="{{ route('users') }}">Usuarios<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Clasificación<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Libros<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Materiales<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Editoriales<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Autores<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Préstamos<span class="sr-only">(current)</span></a>
                               </li>
                           @endif
                           @if (Auth::user()->user_type === \App\User::TYPE_ADMIN)
                               <li>
                                   <a href="#">Adeudos<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Reportes<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Carreras<span class="sr-only">(current)</span></a>
                               </li>
                               <li>
                                   <a href="#">Código de libro<span class="sr-only">(current)</span></a>
                               </li>
                           @endif
                           <li class="dropdown">
                               <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   {{ Auth::user()->name }} <span class="caret"></span>
                               </a>

                               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                               </ul>
                           </li>
                       @endguest
                   </ul>
               </div>
           </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer align-items-center container-fluid text-center">
            <span>Copyright © Tec MM campus Vallarta 2020 Todos los derechos reservados</span>
        </footer>
    </div>
</body>
</html>
