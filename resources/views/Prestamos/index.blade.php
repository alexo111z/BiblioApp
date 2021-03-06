@extends('layouts.dashboard')
@section('titulo', "Prestamos | BiblioApp")
@section('content')

<div id="prestamosindex">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #FFFF; padding: 15px 10px;">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Prestamos</li>
    </ol>
</nav>
<div class="row" id="crud" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="col-xs-12">
        <h1 class="page-header" style="margin-top: 0;">Prestamos <small class="text-muted" style="font-size:24px">Panel de control</small></h1>
    </div>
    <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
        <div class="row">
            <div class="col-sm-6">
                <a v-on:click="limpiartodo()" href="" class="btn btn-primary" style="background-color: #6d356c; border-color: #6d356c;" data-toggle="modal" data-target="#create">
                    <i class="fa fa-pencil"></i> Nuevo Prestamo
                </a>

            </div>
            <div class="col-sm-6" style="text-align: right;">
                <input v-on:keyup="searchprestamo()" type="text" name="control" id="control" placeholder="No.Control / Apellidos" style="padding: .5rem;">
            </div>
        </div>



        <table class="table table-hover table-striped" style="margin-top: 1.5rem;">

            <thead>
                <tr>
                    <th>Folio</th>
                    <th>Prestatario</th>
                    <th>Fecha De Inicio</th>
                    <th>Fecha De Término</th>
                    <th>Entregado</th>
                    <th>Estado</th>
                    <th>Renovaciones</th>

                </tr>
            </thead>

            <tbody>
                <tr v-for="keep in keeps">
                    <td width="10px">@{{keep.folio}}</td>
                    <td>@{{keep.nombre+' '+keep.apellidos}}</td>
                    <td>@{{keep.fecha_inicio}}</td>
                    <td>@{{keep.fecha_final}}</td>
                    <td>@{{keep.fecha_entrega !=null ? keep.fecha_entrega:'No Entregado'}}</td>
                    <td style="color:red" v-if="keep.Estado=='Expirado'">@{{keep.Estado}}</td>
                    <td style="color:orange" v-if="keep.Estado=='Vigente'">@{{keep.Estado}}</td>
                    <td style="color:green" v-if="keep.Estado=='Entregado'">@{{keep.Estado}}</td>
                    <td>@{{keep.renovaciones}}</td>
                    <td width="30px"><a href="#" class="btn btn-sm" style="background:#363636;color:white;" v-on:click.prevent="details(keep)"><i class="fa fa-folder-open"></i></a></td>
                    <td width="30px"><a href="#" class="btn btn-sm" style="background:#2da19a;color:white;" v-on:click.prevent="renew(keep)" v-if="keep.renovaciones<3 && keep.Estado=='Vigente'"><i class="fa fa-refresh"></i></a></td>
                </tr>
            </tbody>
        </table>




        <div class="row">
            <div class="col-md-6 col-12">
                Mostrando prestamos del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} prestamos
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
        @include('prestamos.create')
        @include('prestamos.edit')
        @include('prestamos.renew')
    </div>
</div>
<script src="{{asset('js/prestamos/app.js')}}"></script>
</div>
@endsection
