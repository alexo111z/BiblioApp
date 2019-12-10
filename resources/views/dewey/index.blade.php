@extends('layouts.dashboard')
@section('titulo', 'Clasificación DEWEY | BiblioApp')
@section('content')
<ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
    <li><a href="{{route('home')}}">Inicio</a></li>
    <li class="active">Clasificación Dewey</li>
</ol>
<div class="row" id="content" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="col-xs-12">
        <h3 class="page-header" style="margin-top: 0;">Clasificación Dewey <small>Catalogo</small></h3>
    </div>
    <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
        <div class="row col-xs-12" style="margin-bottom:10px;">
            <div class="form-inline">
                <label class="h4">Concentrado </label>
                <select name="clasificacion" id="clasificacion" class="form-control" v-on:change.prevent="CambioClasification()">
                    <option>Seleccione</option>
                    <option v-for="item in items" :value="item.Id" v-if="item.Id < 10">00@{{item.Id}} - @{{item.Nombre}}</option>
                    <option :value="item.Id" v-else>@{{item.Id}} - @{{item.Nombre}}</option>
                </select>
            </div>
        </div>
        <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
            <thead>
                <tr>
                    <th width="30px">Clave</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody v-for="dewey in lista">
                <tr>
                    <th v-if="dewey.Id < 10">00@{{dewey.Id}}</th>
                    <th v-else-if="dewey.Id >= 10 && dewey.Id < 100">0@{{dewey.Id}}</th>
                    <th v-else>@{{dewey.Id}}</th>
                    <td>@{{dewey.Nombre}}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6 col-12">
                Mostrando del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} resultados
            </div>
            <div class="col-md-6 col-12">
                <nav style="float: right;">
                    <ul class="pagination" style="margin:0;">
                        <li v-bind:class="[pagination.current_page == 1 ? 'disabled':'']">
                            <a href="javascript:void();" v-if="pagination.current_page == 1">Atras</a>
                            <a href="javascript:void();" v-else @click.prevent="changePage(pagination.current_page - 1)">Atras</a>
                        </li>
                        <li v-for="page in pageNumber" v-bind:class="[page == isActived ? 'active':'']">
                            <a href="javascript:void();" @click.prevent="changePage(page)">
                                @{{page}}
                            </a>
                        </li>
                        <li v-bind:class="[pagination.current_page == pagination.last_page ? 'disabled':'']">
                            <a href="javascript:void();" v-if="pagination.current_page == pagination.last_page">Siguiente</a>
                            <a href="javascript:void();" v-else @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/dewey/app.js')}}"></script>
@endsection
