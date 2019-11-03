<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autores</title>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Submenu 1</a></li>
                        <li><a href="#">Submenu 2</a></li>
                        <li><a href="#">Submenu 3</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Submenu 4</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu 2 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Submenu 1</a></li>
                        <li><a href="#">Submenu 2</a></li>
                        <li><a href="#">Submenu 3</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Submenu 4</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu 3 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Submenu 1</a></li>
                        <li><a href="#">Submenu 2</a></li>
                        <li><a href="#">Submenu 3</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Submenu 4</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu 4 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Submenu 1</a></li>
                        <li><a href="#">Submenu 2</a></li>
                        <li><a href="#">Submenu 3</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Submenu 4</a></li>
                    </ul>
                </li>
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
