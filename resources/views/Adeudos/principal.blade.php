@extends('app')
@section('title', 'Adeudos')
@section('content')
{{--    Barra de direccion--}}
    <ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
        <li><a href="javascript:void();">Inicio</a></li>
        <li class="active">Adeudos</li>
    </ol>

{{--    div General--}}
    <div class="row" id="crud" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
{{--        Titulo de la pagina (Sobre la tabla)--}}
        <div class="col-xs-12">
            <h1 class="page-header" style="margin-top: 0;">Adeudos <small>Panel de control</small></h1>
        </div>
{{--        div Datos--}}
        <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
            <div class="row">
                <div class="col-sm-6">
                    <a href="" class="btn btn-primary" style="background-color: #2da19a;" data-toggle="modal" data-target="#create">
                        <i class="fa fa-pencil"></i> Registrar autor
                    </a>
{{--                    Mostrar--}}
{{--                        <select id="values" @change.prevent="changeListSize()">--}}
{{--                            <option>10</option>--}}
{{--                            <option>25</option>--}}
{{--                            <option>50</option>--}}
{{--                            <option>100</option>--}}
{{--                        </select>--}}
{{--                        Registros--}}
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <input v-on:keyup="searchAutor()" type="text" id="search" placeholder="Buscar..." style="padding: .5rem;">
                </div>
            </div>
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                <tr>
                    <th width="10px">#</th>
                    <th>Nombre</th>
                    <th width="10px">Libros</th>
                    <th width="20px" colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody v-for="autor in autores">
                <tr>
                    <th>@{{autor.IdAutor}}</th>
                    <td>
                        @{{autor.Nombre}} @{{autor.Apellidos}}
                    </td>
                    <td width="10px">
                        5
                    </td>
                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-warning btn-sm" v-on:click.prevent="editAutor(autor)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-danger btn-sm" v-on:click.prevent="deleteAutor(autor)"><i class="fa fa-user-times"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 col-12">
                    Mostrando autores del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} autores
                </div>
                <div class="col-md-6 col-12">
                    <nav style="float: right;">
                        <ul class="pagination" style="margin:0;">
                            <li v-bind:class="[pagination.current_page == 1 ? 'disabled':'']">
                                <a href="javascript:void();" v-if="pagination.current_page == 1">Atras</a>
                                <a href="javascript:void();" v-else
                                   @click.prevent="changePage(pagination.current_page - 1)">Atras</a>
                            </li>
                            <li v-for="page in pageNumber" v-bind:class="[page == isActived ? 'active':'']">
                                <a href="javascript:void();" @click.prevent="changePage(page)">
                                    @{{page}}
                                </a>
                            </li>
                            <li v-bind:class="[pagination.current_page == pagination.last_page ? 'disabled':'']">
                                <a href="javascript:void();" v-if="pagination.current_page == pagination.last_page">Siguiente</a>
                                <a href="javascript:void();" v-else
                                   @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            @include('create')
            @include('edit')
        </div>
    </div>
@endsection
