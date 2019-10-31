@extends('app')
@section('content')
<ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
    <li><a href="javascript:void();">Inicio</a></li>
    <li class="active">Reportes</li>
</ol>
<div class="row" id="reportes" style="background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="row col-sm-12">
        <div class="col-sm-4">
            <h1 class="page-header" style="margin-top: 0;">Reportes <small>Panel de control</small></h1>
        </div>
        <div class="col-sm-8  align-items-center text-right mr-0">
            <div class="col-sm-4 my-1">
                <label>Periodo del:</label>
                <input type="date"  style="padding: .5rem;" min="2018-01-01" max="2020-12-31">
            </div>
            <div class="col-sm-3 my-1">
                <label>al:</label>
                <input type="date"  style="padding: .5rem;" min="2018-01-01" max="2020-12-31">
            </div>
            <div class="col-sm-4 ">
                <label>Reporte de:</label>
                <select style="padding: .5rem;" >
                    <option>Prestamos</option>
                    <option>Libros</option>
                    <option>Multas</option>
                </select>
            </div>
            <div class="col-sm-1 ">
                <a href="" class="btn btn-primary" style="background-color: #2da19a;" data-toggle="modal" data-target="#create">Aceptar
                </a>
            </div>
        </div>
    </div>
    <div class="col-xs-12" style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
        <div class="row col-sm-12 ">
                <div class="col-sm-4">
                        <label>Seleccionar la clasificación</label><br>
                        <select style="padding: .5rem;" >
                                <option><p>000</p>-<p>Generales, computadoras</p></option>
                                <option><p>000</p>-<p>Generales, computadoras</p></option>
                                <option><p>000</p>-<p>Generales, computadoras</p></option>
                                <option><p>000</p>-<p>Generales, computadoras</p></option>
                                <option><p>000</p>-<p>Generales, computadoras</p></option>
                        </select>
                </div>
                <div class="col-sm-4">
                        <label>Seleccionar la carrera</label><br>
                        <select style="padding: .5rem;" >
                                <option><p>1</p>-<p>Ingeniería en sistemas Computacionales</p></option>
                        </select>
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
            <tbody v-for="reporte in reportes">
                <tr>
                    <th>@{{reporte.id}}</th>
                    <td>
                    @{{reporte.keep}}
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
    </div>
            <div class="col-sm-5">
               <pre> @{{ $data }}</pre>
        </div>
</div>





@endsection