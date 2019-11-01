
<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
        <!--FILTRADO -->
        <div class="row col-sm-6 "style="margin-right:10px;">
            <div class="row col-sm-4" style="min-width: max-content;">
                <label>Seleccionar clasificación:</label><br>
                <div class="col-sm-3" style="padding-top: .5rem; ">
                    <select style="padding: .5rem;" > <!--enlazar select a la tabla clasificacion-->
                            <option><p>000</p>-<p>Generales, computadoras</p></option>
                    </select>
                </div>
            </div>
            <div class="row col-sm-4"  style="min-width: max-content;">
                <label>Seleccionar la carrera</label><br>
                <div class="col-sm-3" style="padding-top: .5rem; ">
                    <select style="padding: .5rem;" > <!-- enlazar select a tabla carreras -->
                        <option>Ingeniería en sistemas Computacionales</option>
                    </select>
                </div>
            </div>
            <a href="#" class="btn btn-primary" style="background-color: #6d356c; margin:25px 15px ;width:145px;" data-toggle="" data-target="#">consultar</a>
        </div> 
        <!--FIN FILTRADO -->
        <!--TABLA GENERAL PRESTAMOS, NO SE IMPRIMIME, muestra lo datos según  el
        peiodo establecido arriba y tambien segun la clasificación y carrera seleccionada -->
        <div class="col-sm-6">
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                    <tr>
                        <th colspan="2">Préstamos en el periodo seleccionado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Préstamos por carrera</td>
                        <td>11111</td><!-- numero de Préstamos por Carrera -->
                    </tr>
                    <tr>
                        <td>Préstamos por clasificación</td>
                        <td>11111</td><!--numero de Préstamos por Clasificación -->
                    </tr>
                    <tr>
                        <td>Préstamos totales</td>
                        <td>111111</td><!--numero de Préstamos Totales -->
                    </tr>
                </tbody>
            </table>
        </div>
        <!--FIN DE TABLA GENERAL DE PRESTAMOS-->
        <div class="col-sm-12">
            <div class="col-sm-8 text-center"><h3>Alumnos con más prestamos en el periodo:</h3></div>
            <div class="col-sm-4" >
                <!-- boton para imprimir la tabla de alumnos con mas prestamos -->
                <a href="#" class="btn btn-primary" style="background-color: #6d356c; margin:15px;" data-toggle="" data-target="#">Imprimir PDF</a>
            </div>
        </div>
        <!--TABLA DE ALUMNOS CON MAS PRESTAMOS,SE IMPRIME, muestra los alumnos con mas prestamos del periodo
         sin importar la clasificación o carrera seleccionada. -->

        <div class="row col-xs-12" style="margin-bottom:10px;max-height:350px; overflow:auto;">
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                    <tr>
                        <th style="padding:3px;">#</th>
                        <th style="padding:3px;">Préstamos</th>
                        <th style="padding:3px;">No. Control</th>
                        <th style="padding:3px;">Nombre</th>
                        <th style="padding:3px;">Carrera</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td style="padding:3px;">1</td> <!--#-->
                        <td style="padding:3px;">23</td> <!--Número de prestamos en el periodo-->
                        <td style="padding:3px;">15021049</td><!--No. de control-->
                        <td style="padding:3px;">María Guadalupe González Hernández</td> <!--Nombre-->
                        <td style="padding:3px;">Ingenieria en Sistemas Computacionales</td><!--Carrera-->
                    </tr>
                </tbody>
                
            </table>
        </div>  
        <!--FIN DE TABLA ALUMNOS CON MAS PRESTAMOS -->
    </div>    
</div>
