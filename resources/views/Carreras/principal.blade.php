@extends('formato')

@section('body')

    <h1>{{ $title }}</h1>

    @forelse($carreras as $carrera)
        @if($carrera->Existe == '1')
        <li>{{ $carrera->Nombre }}</li>
        @endif
    @empty
        <li>No hay usuarios registrados.</li>
    @endforelse

    <br>
    <a href="{!! url('/carreras/agregar') !!}" >Agregar</a>

@endsection
