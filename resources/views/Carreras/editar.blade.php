@extends('formato')

@section('body')

    <H1>Editar Carrera</H1>

    <form action="{{ route('carrera.edit', $carrera) }}" method="post">

        {{ csrf_field()  }}
        {{ method_field('PUT') }}

        <label for="clave">Clave:</label>
        <input type="text" name="clave" id="clave" placeholder="" value="{{old('clave', $carrera->Clave) }}" readonly>

        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="" value="{{ old('nombre', $carrera->Nombre) }}">

        <br>

        <button type="submit">Modificar</button>
    </form>
    <br>
    <form action="{{ route('carrera.eliminar', $carrera->Clave) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit">Eliminar</button>
    </form>

@endsection
