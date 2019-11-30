@extends('layouts.dashboard')
@section('titulo', "Colaboradores | BiblioApp")
@section('content')
    <ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
        <li><a href="{{route('home')}}">Inicio</a></li>
        <li class="active">Colaboradores</li>
    </ol>
    <div class="row" id="content" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
        <div class="col-xs-12">
            <h1 class="page-header" style="margin-top: 0;">Colaboradores <small>Panel de control</small></h1>
        </div>
        <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
            <div class="row">
                <div class="col-sm-6">
                    <a href="#" class="btn btn-primary" style="background-color: #6d356c; border-color: #6d356c;" data-toggle="modal" data-target="#usersModal" @click="onAdd()">
                        <i class="fa fa-pencil"></i> Registrar colaborador
                    </a>
                </div>
            </div>

            <div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@{{modal.title}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off">
                                <input type="hidden" name="id" v-model="user.IdUsuario">
                                <div
                                    class="form-group"
                                    v-if="userType == 4">
                                    <label for="control_number">Número de control</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="control_number"
                                        name="control_number"
                                        v-model="user.NoControl">
                                </div>

                                <div
                                    class="form-group"
                                    v-if="modalUser == 3 || modalUser == 5">
                                    <label for="payroll">Número de nómina</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="payroll" name="payroll"
                                        v-model="user.NoNomina">
                                </div>

                                <div class="form-group" v-if="modalUser == 1 || modalUser == 2">
                                    <label for="userName">Nombre de usuario</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="userName"
                                        name="userName"
                                        v-model="user.Nick">
                                </div>

                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        v-model="user.Nombre">
                                </div>

                                <div class="form-group">
                                    <label for="lastName">Apellidos</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="lastName"
                                        name="lastName"
                                        v-model="user.Apellidos">
                                </div>

                                <div class="form-group" v-if="modalUser >= 3">
                                    <label for="phone">Teléfono</label>
                                    <input
                                        type="phone"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        v-model="user.Telefono"
                                        autocomplete="off">
                                </div>

                                <div class="form-group" v-if="modalUser >= 3">
                                    <label for="email">Correo electrónico</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        v-model="user.Correo"
                                        autocomplete="off">
                                </div>

                                <div class="form-group" v-if="modalUser == 4">
                                    <label for="careers">Selecciona una carrera</label>
                                    <select
                                        id="careers"
                                        class="form-control"
                                        v-model="user.IdCarrera">
                                        @foreach ($careers as $career)
                                            <option value="{{ $career->Clave }}">{{ $career->Nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                        v-model="user.Password">
                                </div>

                                <div
                                    class="form-group"
                                    v-if="modalUser == 5">
                                    <label for="position">Puesto</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="position"
                                        name="position" v-model="user.Puesto">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">Cerrar</button>
                            <button
                                type="button"
                                class="btn btn-primary"
                                @click="edit()"
                                v-if="modal.operation === 'edit'">Editar</button>
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="add()"
                                v-if="modal.operation === 'add'">Crear</button>
                        </div>
                    </div>
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
                        <td v-for="(value, key) of user" v-if="key !== 'IdUsuario' && key !== 'IdCarrera'">
                            @{{ value }}
                        </td>
                        <td width="10px">
                            <a
                                class="btn btn-warning btn-sm"
                                style="background-color: #2da19a; border-color: #2da19a;"
                                data-toggle="modal"
                                data-target="#usersModal"
                                @click="onEdit(user)"
                                title="Tooltip on top"><i class="fa fa-edit"></i></a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-danger btn-sm" @click="remove(user)"><i class="fa fa-user-times"></i></a>
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
