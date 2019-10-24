@extends('formato')

@section('body')

    <form action="{{ ($carrera != null) ? url('/carreras/add') : route('/carreras/'.$carrera) }}" method="post">

        {{ csrf_field()  }}
        {{ method_field('PUT') }}

        <label for="clave">Clave:</label>
        <input type="text" name="clave" id="clave" placeholder="" value="{{ $clave = ($carrera != null) ? $carrera->Clave : old('clave') }}">

        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="" value="{{ $clave = ($carrera != null) ? $carrera->Nombre : old('nombre') }}">

        <br>

        <button type="submit">Agregar</button>
    </form>

@endsection
