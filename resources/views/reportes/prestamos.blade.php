<div class="col-xs-12"
    style="background-color: #FFF; padding: 3rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row">
        <div class="col-sm-6">
            <form  method="POST" v-on:submit.prevent="obtenerConcentrado">
                <div class="row">
                    <div class="col-sm-12">
                        <label>Seleccionar clasificación:</label>
                        <select name="clasificacion" id="clasificacion" class="form-control"
                            v-on:change.prevent="getTopic()">
                            <!--enlazar select a la tabla clasificacion-->
                            <option v-for="item in concentrado" :value="item.Id" v-if="item.Id < 10">00@{{item.Id}} -
                                @{{item.Nombre}}</option>
                            <option :value="item.Id" v-else>@{{item.Id}} - @{{item.Nombre}}</option>
                        </select>
                        <select name="topic" id="topic" class="form-control" style="margin-top:1rem;">
                            <!--enlazar select a la tabla clasificacion-->
                            <option v-for="item in topic" :value="item.Id" v-if="item.Id < 10">00@{{item.Id}} -
                                @{{item.Nombre}}</option>
                            <option :value="item.Id" v-else-if="item.Id >= 10 && item.Id < 100">0@{{item.Id}} -
                                @{{item.Nombre}}</option>
                            <option :value="item.Id" v-else>@{{item.Id}} - @{{item.Nombre}}</option>
                        </select>
                        <label>Seleccionar la carrera</label>
                        <select name="carrera" id="carreras" class="form-control">
                            <!-- enlazar select a tabla carreras -->
                            <option  v-for="carrera in carreras" :value="carrera.Clave">@{{carrera.Nombre}}</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-block"
                            style="background-color: #6d356c; padding: 6px 40px; margin-top:20px;">consultar <i class="fa fa-search"></i></a>
                    </div>
                </div>
            </form>
        </div>
        <!--TABLA GENERAL PRESTAMOS, NO SE IMPRIMIME, muestra lo datos según  el
        peiodo establecido arriba y tambien segun la clasificación y carrera seleccionada -->
        <div class="col-sm-6" style="border-left: 1px solid rgb(221, 221, 221);">
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                    <tr>
                        <th colspan="2">Préstamos en el periodo seleccionado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Préstamos por carrera</td>
                        <td v-if="resultados.pcarrera==0">0</td>
                        <td v-else v-for="total in resultados.pcarrera">@{{total.Prestamos}}</td><!-- numero de Préstamos por Carrera -->
                    </tr>
                    <tr>
                        <td>Préstamos por clasificación</td>
                        <td v-if="resultados.pclasificacion==0">0</td>
                        <td v-else v-for="total in resultados.pclasificacion">@{{total.Prestamos}}</td><!-- numero de Préstamos por Carrera -->
                        <!--numero de Préstamos por Clasificación -->
                    </tr>
                    <tr>
                        <td>Préstamos totales</td>
                        <td v-if="resultados.ptotales==0">0</td>
                        <td v-else v-for="total in resultados.ptotales">@{{total.Prestamos}}</td>
                        <!--numero de Préstamos Totales -->
                    </tr>
                </tbody>
            </table>
            <!-- boton para imprimir la tabla de alumnos con mas prestamos -->
            <form action="{{route('printreporte')}}" method="GET" target="_blank">
                <input type="hidden" name="carrera" :value="carrera">
                <input type="hidden" name="inicio" :value="inicio">
                <input type="hidden" name="fin" :value="fin">
                <button  type="submit"  class="btn btn-danger pull-right">Imprimir reporte <i class="fa fa-file-pdf-o"></i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <h4>Alumnos con mas prestamos en el periodo</h4>
        </div>
        <div class="col-sm-12">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th style="padding:3px;">Préstamos</th>
                        <th style="padding:3px;">No. Control</th>
                        <th style="padding:3px;">Nombre</th>
                        <th style="padding:3px;">Carrera</th>
                    </tr>
                </thead>
                <tbody v-if="resultados.plista.length==0">
                    <tr>
                        <td colspan="5" class="text-center">Sin resultados...</td>
                    </tr>
                </tbody>
                <tbody v-else v-for="registro in resultados.plista">

                    <tr>
                        <td style="padding:3px;">@{{registro.Prestamos}}</td>
                        <!--Número de prestamos en el periodo-->
                        <td style="padding:3px;">@{{registro.NoControl}}</td>
                        <!--No. de control-->
                        <td style="padding:3px;">@{{registro.Nombre}} @{{registro.Apellidos}}</td>
                        <!--Nombre-->
                        <td style="padding:3px;">@{{registro.Carrera}}</td>
                        <!--Carrera-->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
            <h4>Reporte de prestamos de docentes y administrativos</h4>
        </div>
        <div class="col-sm-4">
            <label for="tipo">Prestamos de:</label>
            <select class="form-control" name="tipo" id="tipoPrestatario">
                <option value="Docente">Docentes</option>
                <option value="Administrativo">Administrativos</option>
            </select>
            <div class="row">
                <div class="col-sm-6">
                    <a href="#" @click.prevent="consultarPrestatarios" class="btn btn-primary btn-block" style="background-color: #6d356c; margin-top:20px;">Consultar <i class="fa fa-search"></i></a>
                </div>
                <div class="col-sm-6">
                    <form method="GET" action="{{route('printPrestatarios')}}" target="_blank">
                        <input type="hidden" name="tipop" :value="tipoPrestatario">
                        <input type="hidden" name="iniciop" :value="inicio">
                        <input type="hidden" name="finp" :value="fin">
                        <button  type="submit"  class="btn btn-danger btn-block" style="margin-top:20px;">Imprimir reporte <i class="fa fa-file-pdf-o"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <table class="table table-hover table-striped" style="max-height: 300px; overflow: scroll;">
                <thead>
                    <tr>
                        <th style="padding:3px;">#</th>
                        <th style="padding:3px;">Préstamos</th>
                        <th style="padding:3px;">No. de Nomina</th>
                        <th style="padding:3px;">Nombre</th>
                        <th style="padding:3px;">Puesto</th>
                    </tr>
                </thead>
                <tbody v-if="prestamosAdministrativos.length==0">
                    <tr>
                        <td colspan="5" class="text-center">Sin resultados...</td>
                    </tr>
                </tbody>
                <tbody v-else v-for="registro in prestamosAdministrativos">
                    <tr>
                        <td style="padding:3px;">*</td>
                        <td style="padding:3px;">@{{registro.Prestamos}}</td>
                        <!--Número de prestamos en el periodo-->
                        <td style="padding:3px;">@{{registro.Nomina}}</td>
                        <!--No. de control-->
                        <td style="padding:3px;">@{{registro.Nombre}} @{{registro.Apellidos}}</td>
                        <!--Nombre-->
                        <td style="padding:3px;">@{{tipoPrestatario}}</td>
                        <!--Carrera-->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
