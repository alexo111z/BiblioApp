@extends('layouts.dashboard')
@section('titulo', "Adeudos | BiblioApp")
@section('content')
    <ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
        <li><a href="{{route('home')}}">Inicio</a></li>
        <li class="active">Adeudos</li>
    </ol>

    {{--General--}}
    <div class="row" id="adeudosCRUD" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
        {{--    Titulo--}}
        <div class="col-xs-12">
            <h1 class="page-header" style="margin-top: 0;">Adeudos <small>Panel de control</small></h1>
        </div>

        {{--    Contenido--}}
        <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
            <div class="row">
                {{--Filtro fechas--}}
                <div class="form-inline col-sm-6" style="float: left;">
                    <label class="h4">Periodo </label>
                    <div class="input-group">
                        <span class="input-group-addon">Del</span>
                        <input v-model="fechaInicio" @change="filtrarFecha()" type="date" class="input-sm form-control" id="date-start" name="start"/>
                        <span class="input-group-addon">al</span>
                        <input v-model="fechaFinal" @change="filtrarFecha()" type="date" class="input-sm form-control" id="date-end" name="end"/>
                    </div>
                    <button class="btn btn-primary" style="background-color: rgb(109, 53, 108); border-color: rgb(109, 53, 108);"
                        v-on:click="clearDataInput()">
                        <i class="fa fa-calendar"></i>
                        Limpiar
                    </button>
                </div>
                {{-- Filto Tipo de usuario --}}
                <div class="input-group col-sm-3" style="float: left;">
                    <select name="tipo" id="tipo" class="form-control" v-model="tipo" @change="filtrarTipo()">
                      <option value="4" selected hidden>Tipo de usuario</option>
                      <option value="1">Seleccionar alumnos</option>
                      <option value="2">Seleccionar docentes</option>
                      <option value="3">Seleccionar administradores</option>
                      <option value="0">Seleccionar todos</option>
                    </select>
                </div>
                {{-- Buscador--}}
                <div class="col-sm-3" style="float: left;">
                    <input v-model="search" v-on:keyup="searchAdeudo()" type="text" id="search" placeholder="Buscar folio..." style="padding: .5rem;">
                </div>
            </div>

            {{--        Tabla datos--}}
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                <tr>
                    <th width="10px">Folio</th>
                    <th>Prestatario</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de término</th>
                    <th>Entregado</th>
                    <th>Estado</th>
                    <th>Adeudo</th>
                    <th width="20px" colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody  v-for="(adeudo, index) in adeudos" id="tabla">
                <tr>
                    <th>
                        @{{ adeudo.folio }}
                    </th>
                    <td >
                        @{{ adeudo.nombre +' '+ adeudo.apellidos }}
                    </td>-
                    <td>
                        @{{ adeudo.fecha_inicio }}
                    </td>
                    <td>
                        @{{ adeudo.fecha_final }}
                    </td>
                    <td>
                        @{{ adeudo.fecha_entrega !=null ? adeudo.fecha_entrega : 'No Entregado' }}
                    </td>
                    {{-- Estado --}}
                    <td v-if="adeudo.existe==1">
                        <strong class="text-danger">Adeudo</strong>
                    </td>
                    <td v-else>
                        <p class="text-success">Pagado</p>
                    </td>
                    {{-- Adeudo --}}
                    <td v-if="totalAdeudo[index]>100">
                        Donación
                    </td>
                    <td v-else>@{{ totalAdeudo[index] }}</td>

                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-warning btn-sm" style="background-color: #2da19a; border-color: #2da19a;" data-toggle="tooltip" data-placement="top" title="Tooltip on top" v-on:click.prevent="showAdeudo(adeudo, totalAdeudo[index])"><i class="fa fa-list"></i></a>
                    </td>
                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-danger btn-sm" v-on:click.prevent="deleteAdeudo(adeudo,totalAdeudo[index],adeudo.existe,{{ Session::get('userData')['Tipo'] }})" ><i class="fa fa-user-times"></i></a>
                    </td>
                </tr>
                </tbody>
            </table> <!--Fin tabla-->

{{--        Paginacion--}}
            <div class="row">
{{--            Mensaje del paginado--}}
                <div class="col-md-6 col-12">
                    Mostrando adeudos del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} adeudos
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
            </div><!--Fin Paginacion-->

{{--                    Pruebas--}}
                        {{--<div class="col-sm-12">
                            <pre>
                                @{{ $data }}
                            </pre>
                        </div>--}}

            @include('Adeudos.detalles')
        </div> <!--Fin Contenido-->
    </div>
    <script src="{{asset('js/appAdeudos.js')}}"></script>
@endsection
