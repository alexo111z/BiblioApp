    <div class="modal fade" id="ejemplar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Ejemplares</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-hover" style="margin-top: 1.5rem;">
                                <thead>
                                    <tr>
                                        <th width="20px">Código</th>
                                        <th>ISBN</th>
                                        <th>Fecha Registro</th>
                                        <th>CD</th>
                                        <th colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody v-if="ejemplares.length==0">
                                    <tr>
                                        <td colspan="7" class="text-center">Sin resultados...</td>
                                    </tr>
                                </tbody>
                                <tbody v-else v-for="ejemplar in ejemplares">
                                    <tr>
                                        <th> @{{ejemplar.Codigo}}</th>
                                        <td> @{{ejemplar.ISBN}} </td>
                                        <td> @{{ejemplar.FechaRegistro}}</td>
                                        <td> @{{ejemplar.CD ? 'Si' : 'No'}} </td>
                                        <td width="20px">
                                        <a href="javascript:void()" class="btn btn-warning btn-sm" style="background-color: #2da19a; border-color: #2da19a;" v-on:click.prevent="editEjemplar(ejemplar)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <!--<td width="10px">
                                           <a href="javascript:void()" class="btn btn-danger btn-sm" v-on:click.prevent="deleteEjemplar(ejemplar)"><i class="fa fa-user-times"></i></a>
                                        </td>-->
                                        <td>
                                        <a
                                    :href="'/libros/descargar/' + ejemplar.Codigo +'?esCodigo=true'"
                                    class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                              
                        </div>
                    </div>
                </div>
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
            </div>
        </div>
    </div>

