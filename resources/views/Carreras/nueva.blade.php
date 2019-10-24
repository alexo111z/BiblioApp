@extends('formato')

@section('body')
    <H1>Agragar Carrera</H1>

    <form action="{{ route('carrera.add') }}" method="post">

        {{ csrf_field()  }}

        <label for="clave">Clave:</label>
        <input type="text" name="clave" id="clave" placeholder="" value="{{ old('clave') }}">

        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="" value="{{  old('nombre') }}">

        <br>

        <button type="submit">Agregar</button>
        <button type="reset">Vaciar</button>
    </form>

@endsection
