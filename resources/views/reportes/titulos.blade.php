

<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
        <!--FILTRADO-->
        <div class="row col-sm-12">
        <!--TABLA DE LIBRoS TOTALES EN SISTEMA, no se imprime, es general por lo que
        no se filtra el periodo de registro ni por clasificación ni carrea-->
        <div class="col-sm-4">
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                    <tr>
                        <th colspan="2"><h4>Libros totales en el sistema</h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Títulos registrados</td>
                        <td v-if="resultadosRegistros.ttitulos==0">0</td>
                        <td v-else v-for="total in resultadosRegistros.ttitulos">@{{total.titulos}}</td><!-- Número de Títulos registrados -->
                    </tr>
                    <tr>
                        <td>Ejemplares regístrados</td>
                        <td v-if="resultadosRegistros.tejemplares==0">0</td>
                        <td v-else v-for="total in resultadosRegistros.tejemplares">@{{total.ejemplares}}</td><!-- Número de Ejemplares registrados-->
                    </tr>
                </tbody>
            </table>
        </div>
        <!--FIN TABLA DE LIBRoS TOTALES EN SISTEMA-->
        <form method="POST" v-on:submit.prevent="obtenerConcentradoRegistros">
                <div class="col-sm-8" style="border-left: 1px solid rgb(221, 221, 221);">
                        <h3>Consultar títulos registrados</h3>
                        <div class="row">
                            <!--<div class="col-sm-6">
                                    <label>Seleccionar clasificación</label>
                                    <select name="clasificacion" id="clasificacion" class="form-control"
                                        v-on:change.prevent="getTopic()">
                                        --enlazar select a la tabla clasificacion--
                                        <option v-for="item in concentrado" :value="item.Id" v-if="item.Id < 10">00@{{item.Id}} -
                                            @{{item.Nombre}}</option>
                                        <option :value="item.Id" v-else>@{{item.Id}} - @{{item.Nombre}}</option>
                                    </select>
                                    <select name="topic" id="topic" class="form-control" style="margin-top:1rem;">
                                        --enlazar select a la tabla clasificacion--
                                        <option v-for="item in topic" :value="item.Id" v-if="item.Id < 10">00@{{item.Id}} -
                                            @{{item.Nombre}}</option>
                                        <option :value="item.Id" v-else-if="item.Id >= 10 && item.Id < 100">0@{{item.Id}} -
                                            @{{item.Nombre}}</option>
                                        <option :value="item.Id" v-else>@{{item.Id}} - @{{item.Nombre}}</option>
                                    </select>
                            </div>-->
                            <div class="col-sm-6">
                                <label>Seleccionar la carrera</label>
                                    <select name="carrera" id="carrerast" class="form-control">
                                        <!-- enlazar select a tabla carreras -->
                                        <option  v-for="carrera in carreras" :value="carrera.Clave">@{{carrera.Nombre}}</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-block"
                                style="background-color: #6d356c; padding: 6px 40px; margin-top:20px;">consultar <i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    </div>
        </form>
        </div>
        <div class="col-sm-12">
        <div class="col-sm-8 text-center"><h3>Títulos registrados:</h3></div>
        <div class="col-sm-4" >
            <!-- boton para imprimir la tabla de titulos registrados-->
            <form action="{{route('printreporteRegistros')}}" method="GET" target="_blank">
                <input type="hidden" name="carrerat" :value="carrera">
                <input type="hidden" name="iniciot" :value="inicio">
                <input type="hidden" name="fint" :value="fin">
                <button type="submit" class="btn btn-danger" style=" margin:15px;">Imprimir <i class="fa fa-file-pdf-o"></i></button>
            </form>
        </div>
    </div>
        <!--TABLA DE titulos registrados,SE IMPRIME, muestra los titulos registrados en el año seleciconado, pueden ser
        de todas las carreras y clasificaciones, pero tambien se puede especificar clasificación y/o carrera -->

    <div class="row col-xs-12" style="margin-bottom:10px;max-height:350px; overflow:auto;">
        <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
            <thead>
                <tr>
                    <th style="padding:3px;">#</th>
                    <th style="padding:3px;">Título</th>
                    <th style="padding:3px;">Autor</th>
                    <th style="padding:3px;">Editorial</th>
                    <th style="padding:3px;">Dewey</th>
                    <th style="padding:3px;">Ed.</th>
                    <th style="padding:3px;">Ej.</th>
                    <th style="padding:3px;">Fecha</th>
                </tr>
            </thead>
            <tbody v-if="resultadosRegistros.plista.length==0">
                    <tr>
                        <td colspan="8" class="text-center">Sin resultados...</td>
                    </tr>
                </tbody>
            <tbody v-else v-for="registro in resultadosRegistros.plista">
                <tr>
                    <!--datos del libro --->
                    <td style="padding:3px;">*</td>
                    <td style="padding:3px;">@{{registro.Titulo}}</td>
                    <td style="padding:3px;">@{{registro.Autor}}</td>
                    <td style="padding:3px;">@{{registro.Editorial}}</td>
                    <td style="padding:3px;">@{{registro.Dewey}}</td>
                    <td style="padding:3px;">@{{registro.Edicion}}</td>
                    <td style="padding:3px;">@{{registro.Ejemplares}}</td>
                    <td style="padding:3px;">@{{registro.Registro}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--Fin de la tabla-->
    </div>
</div>
