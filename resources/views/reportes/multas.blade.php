
<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
        <!--TABLA DE Adeudos/multas EN SISTEMA en el perioso, no se imprime-->
        <div class="col-sm-7"style="border-right: 1px solid rgb(221, 221, 221);">
            <table class="table table-hover table-striped" style="margin-top: 1.5rem;" >
                <thead>
                    <tr>
                        <th colspan="2"><h4>Resumen de multas por periodo</h4></th>
                    </tr>
                    <tr>
                        <th >Multas</th>
                        <th >Total</th>
                        <th >Monto total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Todas</td>
                        <td>123</td><!-- Número de todas multas en el periodo -->
                        <td>$1234.00</td> <!--Monto total de las multas en el periodo-->
                    </tr>
                    <tr>
                        <td>Activas</td>
                        <td>123</td><!-- Número de multas activas en el periodo -->
                        <td>$1234.00</td> <!--Monto total de multas activas en el periodo-->
                    </tr>
                    <tr>
                        <td>Inactivas</td>
                        <td>123</td><!-- Número de multas inactivas en el periodo -->
                        <td>$1234.00</td> <!--Monto de multas inactivas  en el periodo-->
                    </tr>
                </tbody>
            </table>
        </div>
        <!--FIN TABLA DE multas en el periodo-->
        <div class="col-sm-5" >
            <div class="col-sm-12"><h3>Consultar multas del periodo</h3></div>
            <div class="row col-sm-4"  style="min-width: max-content;">
                <label>Ver:</label><br>
                <div class="col-sm-3" style="padding-top: .5rem; ">
                    <select style="padding: .5rem;" >
                        <option>Todas</option>
                        <option>Activas</option>
                        <option>Inactivas</option>
                    </select>
                </div>
            </div>
            <!-- Boton para consultar  los titulos registrados-->
            <a href="#" class="btn btn-primary" style="background-color: #6d356c; margin:25px 15px ;width:90px;" data-toggle="" data-target="#">consultar</a>
        </div>
    </div>   
    <div class="col-sm-12">
    <hr > 
        <div class="col-sm-12"><h3>Multas del periodo</h3></div>

        <div class="col-sm-12 text-right" >
            <!-- boton para imprimir la tabla de multas del periodo-->
            <a href="#" class="btn btn-danger"  data-toggle="" data-target="#">Imprimir <i class="fa fa-file-pdf-o"></i></a>
        </div>
    </div>
        <!--TABLA DE Multas por periodo,SE IMPRIME, se puede filtrar por todas, activas o inactivas -->

    <div class="row col-xs-12" style="margin-bottom:10px;max-height:350px; overflow:auto;">
        <table class="table table-hover table-striped" style="margin-top: 1.5rem;">
            <thead>
            
                <tr>
                    <th style="padding:3px;">Folio</th>
                    <th style="padding:3px;">No. Control</th>
                    <th style="padding:3px;">Nombre</th>
                    <th style="padding:3px;">Tipo</th>
                    <th style="padding:3px;">Fecha</th>
                    <th style="padding:3px;">Fecha pago</th>
                    <th style="padding:3px;">Monto</th>
                    <th style="padding:3px;">Usuario</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td style="padding:3px;">261018-0007</td><!--Folio de la multa-->
                    <td style="padding:3px;">15021049</td> <!--No. Control del usuario multado-->
                    <td style="padding:3px;">María Guadalupe González Hernández</td><!--Nombre del usuario multado-->
                    <td style="padding:3px;">Alumno</td><!--Tipo de usuario multado-->
                    <td style="padding:3px;">2018/11/05</td><!--Fecha de la multa-->
                    <td style="padding:3px;">2018/11/12</td><!--Fecha de pago de la multa-->
                    <td style="padding:3px;">$640.00</td><!--Monto de la multa-->
                    <td style="padding:3px;">Martha Ramírez Quiñonez</td><!--usuario que marco como pagada la multa-->
                </tr>
            </tbody>
        </table>
    </div> 
    <!--FIn de la tabla de multas del periodo-->
</div>
