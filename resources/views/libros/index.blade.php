@extends('layouts.dashboard')
@section('titulo', "Adeudos | BiblioApp")
@section('content')
    <ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
        <li><a href="javascript:void();">Inicio</a></li>
        <li class="active">Libros</li>
    </ol>

    {{--General--}}
    <div class="row" id="librosCRUD" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
        {{--    Titulo--}}
        <div class="col-xs-12">
            <h1 class="page-header" style="margin-top: 0;">Libros <small>Panel de control</small></h1>
        </div>

        //{{--Contenido--}}
        <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
            <div class="row">
                <div class="col-sm-6">
                </div>

        {{--Buscador--}}
                <div class="col-sm-6" style="text-align: right;">
                    <input v-on:keyup="searchCarrera()" type="text" id="search" placeholder="Buscar..." style="padding: .5rem;">
                </div>
            </div>

        {{--Tabla datos--}}
    <table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>ISBN</th>
            <th>Titulo</th>
            <th>IdAutor</th>
            <th>IdEditorial</th>
            <th>IdCarrera</th>
            <th>deway</th>
            <th>Edicion</th>
            <th>Año</th>
            <th>Volumen</th>
            <th>Ejemplares</th>
            <th>Ejem. Disponibles</th>
            <th>Imagen</th>
            <th>Fecha Registro</th>
            <th>Existe</th>
        </tr>
    </thead>
    <tbody>
    @foreach($libro as $libro)    
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$libro->ISBN}}</td>
            <td>{{$libro->Titulo}}</td>
            <td>{{$libro->IdAutor}}</td>
            <td>{{$libro->IdEditorial}}</td>
            <td>{{$libro->IdCarrera}}</td>
            <td>{{$libro->deway}}</td>
            <td>{{$libro->Edicion}}</td>
            <td>{{$libro->Year}}</td>
            <td>{{$libro->Volumen}}</td>
            <td>{{$libro->Ejemplares}}</td>
            <td>{{$libro->EjemDisp}}</td>
            <td> <img src="{{ asset('storage').'/'.$libro->Imagen}}" alt="" width="100"></td>
            <td>{{$libro->FechaRegistro}}</td>
            <td>{{$libro->Existe}}</td>
            <td>
            
            <a href="{{ url('/libros/'.$libro->ISBN.'/edit')}}">Editar</a>

            <form method="post" action="{{ url('/libros/'.$libro->ISBN) }}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
            </form>
            
        </tr>
    @endforeach
    </tbody>
</table>

  
@endsection
