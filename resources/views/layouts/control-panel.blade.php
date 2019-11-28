@extends('layouts.dashboard')
@section('titulo', "Panel de control | BiblioApp")
@section('content')
    <div class="dashboard">
          <h1>Panel de control</h1>

          <div class="container">
                <div class="row section">
                    <div class="col-md-4">
                    <i class="fa fa-users"></i>
                    <p class="section-title"><a href="#">Usuarios</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-tags"></i>
                    <p class="section-title"><a href="#">Clasificación</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-book"></i>
                    <p class="section-title"><a href="#">Libros</a></p>
                </div>
            </div>
            <div class="row section">
                <div class="col-md-4">
                    <i class="fa fa-cubes"></i>
                    <p class="section-title"><a href="#">Materiales</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-university"></i>
                    <p class="section-title"><a href="#">Editoriales</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-newspaper-o"></i>
                    <p class="section-title"><a href="#">Autores</a></p>
                </div>
            </div>
            <div class="row section">
                <div class="col-md-4">
                    <i class="fa fa-handshake-o"></i>
                    <p class="section-title"><a href="#">Prestamos</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-money"></i>
                    <p class="section-title"><a href="#">adeudos</a></p>
                </div>
                    <div class="col-md-4">
                        <i class="fa fa-line-chart"></i>
                        <p class="section-title"><a href="#">reportes</a></p>
                    </div>
            </div>

            <div class="row section">
                <div class="col-md-4">
                    <i class="fa fa-graduation-cap"></i>
                    <p class="section-title"><a href="#">Carreras</a></p>
                </div>
                <div class="col-md-4">
                    <i class="fa fa-qrcode"></i>
                    <p class="section-title"><a href="#">Código de libro</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
