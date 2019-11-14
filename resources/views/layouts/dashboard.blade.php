<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <style>
        .navbar-default .navbar-nav > li > a{
            color:grey;
        }
        .navbar-default{
            background-color: white;
        }
        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus,
        .dropdown-menu > li > a:hover,
        .navbar-default .navbar-nav > li > a:hover{
            color:white;
            background-color: #6d356c;
        }
        .pagination > .active > a,
        .pagination > .active > a:hover,
        .pagination > .active > a:focus,
        .pagination > .active > a:active{
            background-color: #6d356c;
            border-color: #6d356c;
        }
        .pagination > li > a{
            color: #2da19a;
        }
        .navbar{
            margin-bottom: 0;
        }
        a{
            color:#2da19a;
        }
        .navbar-brand > img{
            width: 64px;
            display: inline;
        }
        .navbar-brand {
            float: initial;
        }
        .navbar-nav{
            padding-top: 10px;
        }
    </style>
</head>

<body style="background-color: #ddd;">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/LogoTec.png') }}"/>
                    BiblioApp ®
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios   <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Prestamos</a></li>
                        <li><a href="{{asset('adeudos')}}">Adeudos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Material Bibliografico   <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{asset('libros')}}">Libros</a></li>
                        <li><a href="#">Materiales</a></li>
                        <li><a href="{{asset('dewey')}}">Clasificación DEWEY</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{asset('autores')}}">Autores</a></li>
                        <li><a href="{{asset('editoriales')}}">Editoriales</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control de usuarios   <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Colaboradores</a></li>
                        <li><a href="#">Prestatarios</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{asset('carreras')}}">Carreras</a></li>
                    </ul>
                </li>
                <li><a href="{{asset('reportes')}}">Reportes</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" style="padding:3rem;">
        @yield('content')
    </div>
    <footer class="footer align-items-center container-fluid text-center" style="background-color: #363636; padding: 5rem 0;">
            <span style="color: white; font-weight: 400;">Copyright © Tec MM campus Vallarta 2020 Todos los derechos reservados</span>
        </footer>
</body>

</html>
