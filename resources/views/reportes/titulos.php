

<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
        <!--FILTRADO-->
        <div class="row col-sm-12">
            <div class="row col-sm-2" style="min-width: max-content;">
                <label>Año:</label><br> <!--Poner años con los cuales se puede buscar-->
                <div class="col-sm-3" style="padding-top: .5rem; ">
                    <select style="padding: .5rem;" >
                        <option>2019</option>
                        <option>2018</option>
                    </select>
                </div>
            </div>
            <div class="row col-sm-4" style="min-width: max-content;">
                <label>Seleccionar clasificación:</label><br>
                <div class="col-sm-3" style="padding-top: .5rem; ">
                    <select style="padding: .5rem;" >
                        <option>Todas las clasificaciones</option>
                        <!--Añadir las clasificaciones de la BD -->
                        <option><p>000</p>-<p>Generales, computadoras</p></option>
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
            <!-- Boton para consultar  los titulos registrados-->
            <a href="#" class="btn btn-primary" style="background-color: #6d356c; margin:25px 15px ;width:145px;" data-toggle="" data-target="#">consultar</a>
        </div> 
        <div class="col-sm-12">
        <div class="col-sm-8 text-center"><h3>Títulos registrados:</h3></div>
        <div class="col-sm-4" >
            <!-- boton para imprimir la tabla de titulos registrados-->
            <a href="#" class="btn btn-danger" style=" margin:15px;" data-toggle="" data-target="#">Imprimir <i class="fa fa-file-pdf-o"></i></a>
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
            <tbody>
                <tr>
                    <!--datos del libro --->
                    <td style="padding:3px;">1</td>
                    <td style="padding:3px;">Matemáticas 2 Cálculo integral</td>
                    <td style="padding:3px;">Zill Dennis G.</td>
                    <td style="padding:3px;">Mcgraw Hill</td>
                    <td style="padding:3px;">700</td>
                    <td style="padding:3px;">1</td>
                    <td style="padding:3px;">1</td>
                    <td style="padding:3px;">2013/01/09</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--Fin de la tabla-->
    </div>    
</div>