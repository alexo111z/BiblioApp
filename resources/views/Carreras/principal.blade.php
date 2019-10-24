@extends('formato')

@section('body')

    <h1>{{ $title }}</h1>

    @forelse($carreras as $carrera)
        @if($carrera->Existe == '1')
        <li>{{ $carrera->Nombre }} - <a href="{{route('carrera.formEdit', $carrera->Clave)}}">Editar</a></li>
        @endif
    @empty
        <li>No hay carreras registradas.</li>
    @endforelse

    <br>
    <a href="{{ route('carrera.nueva') }}" >Agregar</a>

@endsection
