@extends('layouts.dashboard')
@section('titulo', "Materiales | BiblioApp")
@section('content')
   
<ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
    <li><a href="javascript:void();">Inicio</a></li>
    <li class="active">Materiales</li>
</ol>

<div id="materialesCRUD" class="row" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="col-xs-12">
       <h1 class="page-header" style="margin-top: 0;">Materiales <small>Panel de control</small></h1>
    </div>
    <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
        <div class="row">
            <div class="col-sm-6">
                <a href="" class="btn btn-primary" style="background-color: #6d356c; border-color: #6d356c;" data-toggle="modal" data-target="#create">
                    <i class="fa fa-pencil"></i> Registrar material
                </a>
                <!--Mostrar
                    <select id="values" @change.prevent="changeListSize()">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    Registros-->
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <input v-on:keyup="searchMaterial()" type="text" id="search" placeholder="Buscar..." style="padding: .5rem;">
            </div>
        </div>
        <table class="table table-striped table-hover" style="margin-top: 1.5rem;">
            <thead>
                <tr>
                  
                    <th>Titulo</th>
                    <th>Carrera</th>
                    <th>Año</th>
                    <th>Ejemplares</th>
                    <th>Tipo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody v-if="materiales.length==0">
                <tr>
                    <td colspan="7" class="text-center">Sin resultados...</td>
                </tr>
            </tbody>
            <tbody v-else v-for="material in materiales">
                <tr>
              
                    <td> @{{material.Titulo}} </td>
                    <td> @{{material.Clave}} </td>
                    <td> @{{material.Year}} </td>
                    <td> @{{material.Ejemplares}} </td>
                    <td> @{{material.Tipo}} </td>
                    <td width="20px">
                    <a href="javascript:void()" class="btn btn-warning btn-sm" style="background-color: #2da19a; border-color: #2da19a;" v-on:click.prevent="editMaterial(material)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <a href="javascript:void()" class="btn btn-danger btn-sm" v-on:click.prevent="deleteMaterial(material)"><i class="fa fa-user-times"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6 col-12">
                Mostrando materiales del @{{pagination.from}} al @{{pagination.to}} de un total de @{{pagination.total}} materiales.
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
        @include('materiales.create')
        @include('materiales.edit')
        
      
    </div>
</div>

    <script src="{{asset('js/appMateriales.js')}}"></script>

@endsection
