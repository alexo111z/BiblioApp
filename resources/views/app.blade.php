<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prestamos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
html,
.nav{
    background-color:white;
}
body {
  overflow-x: hidden;
}

.navbar-light .navbar-brand {
color: #FFFFFF;

}

.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
color: #FFFFFF;
background-color: #6d356c;
}

.navbar-light .navbar-nav .nav-link {
    
color: #707070;

}

.navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
color: #FFFFFF !important;
background-color: #6d356c;
}

.navbar-light .navbar-nav .dropdown-item:focus, .navbar-light .navbar-nav .dropdown-item:hover {
color: #FFFFFF !importantiiii;
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

    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">            
                <a class="navbar-brand" href="#" style="font-size:18px;color:#777777;">
                    <img src="{{ asset('images/LogoTec.png') }}"/>
                    BiblioApp ®
                </a>            
        <ul class="nav navbar-nav navbar-right">      
                
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menú 1
        </a>
       <ul class="dropdown-menu">
          <a class="dropdown-item" href="#">submenu 1</a>
          <a class="dropdown-item" href="#">Submenu 2</a>          
    </ul>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menú 2
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">submenu 1</a>
          <a class="dropdown-item" href="#">Submenu 2</a>          
        </div>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menú 3
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">submenu 1</a>
          <a class="dropdown-item" href="#">Submenu 2</a>          
        </div>
        </li>


      

            </ul>
        </div>
    </nav>
    <div class="container-fluid" style="padding:3rem;" id="prestamosindex">
         @yield('content')
    </div>
    <footer class="footer align-items-center container-fluid text-center" style="background-color: #363636; padding: 5rem 0;">
            <span style="color: white; font-weight: 400;">Copyright © Tec MM campus Vallarta 2020 Todos los derechos reservados</span>
        </footer>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
