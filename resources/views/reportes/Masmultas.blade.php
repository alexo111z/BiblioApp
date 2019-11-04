<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
        <div class="row col-sm-12">
            <!--Al dar click se mostrarán la tabla con la información -->
            <a href="#" class="btn btn-primary" style="background-color: #6d356c; margin:25px 15px ;width:145px;" data-toggle="" data-target="#">Consultar</a> 
        </div> 
        <div class="col-sm-12">
                <div class="col-sm-8 text-center"><h3>Alumnos con más multas en el periodo:</h3></div>
                <div class="col-sm-4" >
                    <!-- boton para imprimir la tabla de alumnos con mas multas -->
                    <a href="#" class="btn btn-danger" style=" margin:15px;" data-toggle="" data-target="#">Imprimir <i class="fa fa-file-pdf-o"></i></a>
                </div>
        </div>
        <!--TABLA DE ALUMNOS CON MAS MULTAS EN EL PERIODO, se imprime -->
        <div class="row col-xs-12" style="margin-bottom:10px;max-height:300px; overflow:auto;">
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
                <thead>
                    <tr>
                        <th style="padding:3px;">#</th>
                        <th style="padding:3px;">Multas</th>
                        <th style="padding:3px;">No. Control</th>
                        <th style="padding:3px;">Nombre</th>
                        <th style="padding:3px;">Carrera</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td style="padding:3px;">1</td> <!--#-->
                        <td style="padding:3px;">23</td> <!--Número de multas en el periodo-->
                        <td style="padding:3px;">15021049</td><!--No. de control-->
                        <td style="padding:3px;">María Guadalupe González Hernández</td> <!--Nombre-->
                        <td style="padding:3px;">Ingenieria en Sistemas Computacionales</td><!--Carrera-->
                    </tr>
                </tbody>
            </table>
        </div>
        <!--FIN DE LA TABLA -->
    </div>    
</div>