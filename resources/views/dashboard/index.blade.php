@extends('layouts.dashboard')
@section('titulo', "Panel de control | BiblioApp")
@section('content')
    <style>
        .dashboard {
            text-align: center !important;
        }

        .dashboard a {
            color: black;
        }

        .dashboard a:hover {
            text-decoration: none;
            color: #6d356c;
        }

        .dashboard h1 {
            color: black;
            font-size: 60px;
            text-transform: uppercase;
            margin: 30px 0;
        }

        .section .section-title {
            text-transform: uppercase;
            font-size: 25px;
        }

        .section .fa {
            font-size: 130px;
            margin: 30px;
        }
    </style>
<div class="row" id="content" style="background-color: #fafafa;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="dashboard">
          <h1>Panel de control</h1>
            @if(\App\User::isAdmin())
                <div class="container">
                    <div class="row section">
                        <div class="col-md-4">
                            <a href="{{route('usuarios')}}">
                                <i class="fa fa-users"></i>
                                <p class="section-title">Bibliotecarios</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('prestatarios')}}">
                                <i class="fa fa-exchange"></i>
                                <p class="section-title">prestatarios</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('libros')}}">
                                <i class="fa fa-book"></i>
                                <p class="section-title">Libros</p>
                            </a>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4">
                            <a href="{{asset('materiales')}}">
                                <i class="fa fa-cubes"></i>
                                <p class="section-title">Materiales</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('editoriales')}}">
                                <i class="fa fa-university"></i>
                                <p class="section-title">Editoriales</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('autores')}}">
                                <i class="fa fa-newspaper-o"></i>
                                <p class="section-title">Autores</p>
                            </a>
                        </div>
                    </div>
                    <div class="row section">
                        <div class="col-md-4">
                            <a href="{{asset('prestamos')}}">
                                <i class="fa fa-handshake-o"></i>
                                <p class="section-title">Prestamos</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('adeudos')}}">
                                <i class="fa fa-money"></i>
                                <p class="section-title">adeudos</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('reportes')}}">
                                <i class="fa fa-line-chart"></i>
                                <p class="section-title">reportes</p>
                            </a>
                        </div>
                    </div>

                    <div class="row section">
                        <div class="col-md-4">
                            <a href="{{asset('dewey')}}">
                                <i class="fa fa-tags"></i>
                                <p class="section-title">Clasificación</p>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{asset('carrera')}}">
                                <i class="fa fa-graduation-cap"></i>
                                <p class="section-title">Carreras</p>
                            </a>
                        </div>
                        <!--<div class="col-md-4">
                            <a href="#">
                                <i class="fa fa-qrcode"></i>
                                <p class="section-title">Código de libro</p>
                            </a>
                        </div>-->
                    </div>
                </div>
            @elseif (\App\User::isCollaborator())
            <div class="container">
                <div class="row section">
                    <div class="col-md-4">
                        <a href="{{asset('libros')}}">
                            <i class="fa fa-book"></i>
                            <p class="section-title">Libros</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{asset('materiales')}}">
                            <i class="fa fa-cubes"></i>
                            <p class="section-title">Materiales</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{asset('editoriales')}}">
                            <i class="fa fa-university"></i>
                            <p class="section-title">Editoriales</p>
                        </a>
                    </div>
                </div>
                <div class="row section">
                    <div class="col-md-4">
                        <a href="{{asset('autores')}}">
                            <i class="fa fa-newspaper-o"></i>
                            <p class="section-title">Autores</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{asset('prestamos')}}">
                            <i class="fa fa-handshake-o"></i>
                            <p class="section-title">Prestamos</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{asset('adeudos')}}">
                            <i class="fa fa-money"></i>
                            <p class="section-title">adeudos</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{asset('dewey')}}">
                            <i class="fa fa-tags"></i>
                            <p class="section-title">Clasificación</p>
                        </a>
                    </div>
                </div>
                <!--<div class="row section">
                    <div class="col-md-4">
                        <a href="#">
                            <i class="fa fa-qrcode"></i>
                            <p class="section-title">Código de libro</p>
                        </a>
                    </div>
                </div>-->
            </div>
            @endif
    </div>
</div>
    <script src="{{asset('js/dashboard/app.js')}}"></script>
@endsection
