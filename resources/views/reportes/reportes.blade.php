@extends('app')
@section('content')


<ol class="breadcrumb" style="background-color: #FFF; padding: 15px 10px;">
    <li><a href="javascript:void();">Inicio</a></li>
    <li class="active">Reportes</li>
</ol>
<div class="row" id="reportes"
    style="min-width:600px!important; background-color: #fbfbfb;box-shadow: 0px 0px 3px 0px rgba(194,194,194,1); padding: 3rem;">
    <div class="row col-xs-12 " style="border-bottom: 1px solid #eee; margin-bottom:10px; padding-bottom:10px;">
        <h1 style="margin-top: 0;">Reportes
            <small>Panel de control</small></h1>
    </div>
    <div class="col-xs-12"
        style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
        <div class="row col-xs-12" style="margin-bottom:10px;">
            <div class="form-inline">
                <label class="h4">Periodo </label>
                <div class="input-group">
                    <span class="input-group-addon">Del</span>
                    <input type="date" class="input-sm form-control" name="start" />
                    <span class="input-group-addon">al</span>
                    <input type="date" class="input-sm form-control" name="end" />
                </div>
            </div>
        </div>
        <div class="row col-xs-12">
            <div class="panel-group">
                <div class="panel panel-default col-xs-12" style="padding:0; background-color: #fff;">
                    <div class="panel-heading " style="border:1px solid #eee; background-color: #f7f7f7;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#prestamos">Reporte de préstamos</a>
                        </h4>
                    </div>
                    <div id="prestamos" class="panel-collapse collapse" style="background-color: #fbfbfb;">
                        <div class="panel-body">
                            @include('reportes.prestamos')
                        </div>
                    </div>

                    <div class="panel-heading " style="border:1px solid #eee; background-color: #f7f7f7;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#masmultas">Reporte de alumnos con más multas</a>
                        </h4>
                    </div>
                    <div id="masmultas" class="panel-collapse collapse" style="background-color: #fbfbfb;">
                        <div class="panel-body">
                            @include('reportes.Masmultas')
                        </div>
                    </div>
                    <div class="panel-heading" style="border:1px solid #eee; background-color: #f7f7f7;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#libros">Reporte de libros</a>
                        </h4>
                    </div>
                    <div id="libros" class="panel-collapse collapse">
                        <div class="panel-body">
                            @include('reportes.libros')
                        </div>
                    </div>
                    <div class="panel-heading" style="border:1px solid #eee; background-color: #f7f7f7;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#titulos">Reporte de títulos registrados por año</a>
                        </h4>
                    </div>
                    <div id="titulos" class="panel-collapse collapse">
                        <div class="panel-body">
                            @include('reportes.titulos')
                        </div>
                    </div>
                    <div class="panel-heading" style="border:1px solid #eee; background-color: #f7f7f7;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse3">Reporte de multas</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            @include('reportes.multas')
                        </div>
                    </div>
                    <div class="panel-heading" style="border:1px solid #eee; background-color: #f7f7f7;">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse4">Catálogo de Libros</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            @include('reportes.catalogo')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/reportes/app.js')}}"></script>
@endsection
