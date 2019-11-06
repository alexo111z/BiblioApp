@extends('layouts.dashboard')
@section('titulo', "Prestamos | BiblioApp")
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb" style="background-color: #FFFF; padding: 15px 10px;">
    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Prestamos</li>
  </ol>
</nav>
<div class="row" id="crud" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="col-xs-12">
        <h1 class="page-header" style="margin-top: 0;">Prestamos <small  class="text-muted" style="font-size:24px">Panel de control</small></h1>
    </div>
    <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
        <div class="row">
            <div class="col-sm-6">
            <a href="" class="btn btn-primary" style="background-color: #6d356c; border-color: #6d356c;" data-toggle="modal" data-target="#create">
                    <i class="fa fa-pencil"></i> Nuevo Prestamo
                </a>
            
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <input type="text" name="numcontrol" id="numcontrol" v-on:keyup="searchprestamo()" placeholder="Buscar..." style="padding: .5rem;">
            </div>
        </div>



        <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
       
<thead>
<tr>
<th>Folio</th>
                    <th>Prestatario</th>
                    <th>Fecha De Inicio</th>
                    <th>Fecha De Término</th>
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
<td>@{{'Estadito'}}</td>
<td>@{{keep.renovaciones}}</td>
<td width="10px"><a href="#" class="btn btn-secondary btn-sm" v-on:click.prevent="editkeep(keep)">Detalles</a></td>
<td colspan="2" width="10px"><a href="#" class="btn btn-primary btn-sm" v-on:click.prevent="renew(keep)">Renovar Prestamo</a></td>
</tr>
</tbody>
</table>




        <div class="row">
            <div class="col-md-6 col-12">
                Mostrando autores del xpaginationfromx al xpaginationtox de un total de xpaginationtotalx autores
            </div>
            <div class="col-md-6 col-12">
            <nav style="float: right;">
                            <ul class="pagination" style="margin:0;">
<!--

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

-->
                            </ul>
                        </nav>
            </div>
        </div>
        @include('prestamos.create')
        @include('prestamos.edit')
        @include('prestamos.renew')      
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
@endsection