@extends('layouts.dashboard')
@section('titulo', "Adeudos | BiblioApp")
@section('content')
    <ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
        <li><a href="javascript:void();">Inicio</a></li>
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
                <div class="col-sm-6">
                    {{--                Boton de registro--}}
{{--                    <a href="#" class="btn btn-primary" style="background-color: #6d356c; border-color: #6d356c;" data-toggle="modal" data-target="#createCarrera">--}}
{{--                        <i class="fa fa-pencil"></i> Registrar carrera--}}
{{--                    </a>--}}

                </div>
                {{--            Buscador--}}
                <div class="col-sm-6" style="text-align: right;">
                    <input v-on:keyup="searchAdeudo()" type="text" id="search" placeholder="Buscar..." style="padding: .5rem;">
                </div>
            </div>

            {{--        Tabla datos--}}
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                <tr>
                    <th width="10px">Folio</th>
                    <th>Prestatario</th>
                    <th>Fecha prestamo</th>
                    <th>Fecha a entregar</th>
                    <th>Fecha entregado</th>
                    <th>Renovaciones</th>
                    <th>Adeudo</th>
                    <th>No Libros</th>
                    <th width="20px" colspan="2">Acciones</th>
                </tr>
                </thead>
                <tbody  v-for="(adeudo, index) in adeudos" id="tabla">
                <tr>
                    <th>
                        @{{ adeudo.Folio }}
                    </th>
                    <td>
                        @{{ adeudo.IdPrestatario }}
                    </td>
                    <td>
                        @{{ adeudo.Fecha_inicio }}
                    </td>
                    <td>
                        @{{ adeudo.Fecha_final }}
                    </td>
                    <td>
                        @{{ adeudo.Fecha_entrega }}
                    </td>
                    <td>
                        @{{ adeudo.Renovaciones }}
                    </td>
                    <td>
                        @{{  totalAdeudo[index] }}
                    </td>
{{--                Cantidad libros prestados--}}
                    <td>
                        @{{  contarLibros[index] }}
                    </td>

                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-warning btn-sm" style="background-color: #2da19a; border-color: #2da19a;" data-toggle="tooltip" data-placement="top" title="Tooltip on top" v-on:click.prevent="editCarrera(carrera)"><i class="fa fa-list"></i></a>
                    </td>
                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-danger btn-sm" v-on:click.prevent="deleteAdeudo(adeudo)" ><i class="fa fa-user-times"></i></a>
                    </td>
                </tr>
                </tbody>
            </table> <!--Fin tabla-->

{{--        Paginacion--}}
            <div class="row">
{{--            Mensaje del paginado--}}
                <div class="col-md-6 col-12">
                    Mostrando carreras del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} carreras
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
                        <div class="col-sm-12">
                            <pre>
                                @{{ $data }}
                            </pre>
                        </div>

{{--            @include('Adeudos.show')--}}
        </div> <!--Fin Contenido-->
    </div>
    <script src="{{asset('js/appAdeudos.js')}}"></script>
@endsection
