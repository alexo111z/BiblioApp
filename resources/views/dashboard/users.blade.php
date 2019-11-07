@extends('layouts.app')

@section('title')
    Usuarios
@endsection

@section('content')
    <div class="module">
        <div class="container" style="background-color: transparent !important;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de control</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <users-module></users-module>
        </div>
    </div>
@endsection
