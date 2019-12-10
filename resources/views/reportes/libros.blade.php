
<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
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
                        <td>11111</td><!-- Número de Títulos registrados -->
                    </tr>
                    <tr>
                        <td>Ejemplares regítrados</td>
                        <td>11111</td><!-- Número de Ejemplares registrados-->
                    </tr>
                </tbody>
            </table>
        </div>
        <!--FIN TABLA DE LIBRoS TOTALES EN SISTEMA-->
        <!--filtrado-->
        <div class="row col-sm-7" style="border-left: 1px solid #dddddd; margin-left:2px;">
            <div class="col-sm-12"><h3>Consultar libros más prestados:</h3></div>
            <div class="row col-sm-4" style="min-width: max-content;">
                <label>Seleccionar clasificación:</label><br>
                <div class="col-sm-3" style="padding-top: .5rem; ">
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
                </div>
            </div>
            <div class="row col-sm-4"  style="min-width: max-content;">
                <label>Seleccionar la carrera</label><br>
                <div class="col-sm-3" style="padding-top: .5rem; ">
                    <select style="padding: .5rem;" >
                        <option>Todas las carreras</option>
                        <!--Añadir las carreras de la BD -->
                        <option>Ingeniería en sistemas Computacionales</option>
                    </select>
                </div>
            </div>
            <a href="#" class="btn btn-primary" style="background-color: #6d356c; margin:25px 15px ;width:145px;" data-toggle="" data-target="#">consultar</a>
        </div>
        <!--Fin filtrado-->
    </div>
    <div class="col-sm-12">
        <div class="col-sm-8 text-center"><h3>Libros más prestados en el periodo:</h3></div>
        <div class="col-sm-4" >
            <!-- boton para imprimir la tabla de libros con mas multas-->
            <a href="#" class="btn btn-danger" style=" margin:15px;" data-toggle="" data-target="#">Imprimir <i class="fa fa-file-pdf-o"></i></a>
        </div>
    </div>
        <!--TABLA DE LIBROS MAS PRESTADOS,SE IMPRIME, muestra los libros mas prestados del periodo, pueden ser
        de todas las carreras y clasificaciones, pero tambien se puede especificar clasificación y/o carrera -->

    <div class="row col-xs-12" style="margin-bottom:10px;max-height:350px; overflow:auto;">
        <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
            <thead>

                <tr>
                    <th style="padding:3px;">#</th>
                    <th style="padding:3px;">Préstamos</th>
                    <th style="padding:3px;">Título</th>
                    <th style="padding:3px;">Autor</th>
                    <th style="padding:3px;">Editorial</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td style="padding:3px;">1</td>
                    <td style="padding:3px;">73</td>
                    <td style="padding:3px;">Matemáticas 2 Cálculo integral</td>
                    <td style="padding:3px;">Zill Dennis G.</td>
                    <td style="padding:3px;">Mcgraw Hill</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--FIn de la tabla de libros mas prestados-->
</div>
