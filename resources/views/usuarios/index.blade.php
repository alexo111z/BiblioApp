@extends('layouts.dashboard')
@section('titulo', "Usuarios | BiblioApp")
@section('content')
    <ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
        <li><a href="#">Inicio</a></li>
        <li class="active">Usuarios</li>
    </ol>
    <div class="row" id="content" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
        <div class="col-xs-12">
            <h1 class="page-header" style="margin-top: 0;">Usuarios <small>Panel de control</small></h1>
        </div>
        <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
            <div class="row">
                <div class="col-sm-6">
                    <a href="" class="btn btn-primary" style="background-color: #6d356c; border-color: #6d356c;" data-toggle="modal" data-target="#create">
                        <i class="fa fa-pencil"></i> Registrar usuario
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <select
                        class="form-control"
                        v-model="userType"
                        @change="getUsers()">
                        <option :value="1" selected>Administrador</option>
                        <option :value="2">Colaborador</option>
                        <option :value="3">Docente</option>
                        <option :value="4">Alumno</option>
                        <option :value="5">Administrativo</option>
                    </select>
                </div>
            </div>
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                    <tr>
                        <th v-for="columnHeader of this.tableColumns[this.userType - 1]">@{{columnHeader}}</th>
                    </tr>
                </thead>
                <tbody v-if="users.length==0">
                    <tr>
                        <td colspan="100" class="text-center">Sin usuarios que mostrar...</td>
                    </tr>
                </tbody>
                <tbody v-else v-for="(user, index) in users">
                    <tr>
                        <th>@{{ index + 1 }}</th>
                        <td v-for="(value, key) of user" v-if="key !== 'IdUsuario'">
                            @{{ value }}
                        </td>
                        <td width="10px">
                            <a
                                class="btn btn-warning btn-sm"
                                style="background-color: #2da19a; border-color: #2da19a;"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Tooltip on top"><i class="fa fa-edit"></i></a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-danger btn-sm"><i class="fa fa-user-times"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 col-12">
                    Mostrando usuarios del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} usuarios
                </div>
                <div class="col-md-6 col-12">
                    <nav style="float: right;">
                        <ul class="pagination" style="margin:0;">
                            <li v-bind:class="[pagination.current_page == 1 ? 'disabled':'']">
                                <a v-if="pagination.current_page == 1">Atras</a>
                                <a v-else @click.prevent="changePage(pagination.current_page - 1)">Atras</a>
                            </li>
                            <li v-for="page in pageNumber" v-bind:class="[page == isActived ? 'active':'']">
                                <a @click.prevent="changePage(page)">
                                    @{{page}}
                                </a>
                            </li>
                            <li v-bind:class="[pagination.current_page == pagination.last_page ? 'disabled':'']">
                                <a v-if="pagination.current_page == pagination.last_page">Siguiente</a>
                                <a v-else @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/usuarios/app.js')}}"></script>
@endsection
