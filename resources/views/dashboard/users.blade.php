@extends('layouts.app')

@section('title')
    Usuarios
@endsection

@section('content')
    <div class="module">
        <h1>Catálogo de Usuarios</h1>

        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de control</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>

            <users-module></users-module>
        </div>
    </div>
@endsection
