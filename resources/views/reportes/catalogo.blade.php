

<div class="col-xs-12" style="background-color: #FFF; padding: 1rem; box-shadow: 0px 0px 5px 0px rgba(194,194,194,1); border-radius:5px;">
    <div class="row col-xs-12" style="margin-bottom:10px;">
        <!--FILTRADO-->
        <div class="row col-sm-12">
            <!-- Boton para consultar el catalogo de libros ORDENADO POR CARRERAS-->
            <a @click.prevent="obtenercatalogo" class="btn btn-primary" style="background-color: #6d356c; margin:25px 15px ;width:145px;" data-toggle="" data-target="#">consultar</a>
        </div>
        <div class="col-sm-12">
        <div class="col-sm-8 text-center"><h3>Catálogo de libros</h3></div>
        <div class="col-sm-4" >
            <!-- boton para imprimir Catalogo-->
            <a href="{{route('printCatalogo')}}" target="_blank" class="btn btn-danger" style=" margin:15px;" data-toggle="" data-target="#">Imprimir <i class="fa fa-file-pdf-o"></i></a>
        </div>
    </div>
        <!--TABLA DE catalogo,SE IMPRIME, se muestran todos los libros en el sistema, ORDENADOS POR CARRERA -->

    <div class="row col-xs-12" style="margin-bottom:10px;max-height:500px; overflow:auto;">
        <table class="table table-hover table-striped" style="margin-top: 1.5rem;  max-height:300px; overflow:scroll;">
            <thead>
                <tr>
                    <th style="padding:3px;">#</th>
                    <th style="padding:3px;">Título</th>
                    <th style="padding:3px;">Autor</th>
                    <th style="padding:3px;">Editorial</th>
                    <th style="padding:3px;">Carrera</th>
                    <th style="padding:3px;">Dewey</th>
                    <th style="padding:3px;">Ed.</th>
                    <th style="padding:3px;">Ej.</th>
                    <th style="padding:3px;">Fecha</th>
                </tr>
            </thead>
            <tbody v-if="catalogo.length==0">
                    <tr>
                        <td colspan="9" class="text-center">Sin resultados...</td>
                    </tr>
                </tbody>
            <tbody v-else v-for="registro in catalogo">
                <tr>
                <!--datos del libro -->
                    <td style="padding:3px;">*</td>
                    <td style="padding:3px;">@{{registro.Titulo}}</td>
                    <td style="padding:3px;">@{{registro.Autor}}</td>
                    <td style="padding:3px;">@{{registro.Editorial}}</td>
                    <td style="padding:3px;">@{{registro.Carrera}}</td>
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
