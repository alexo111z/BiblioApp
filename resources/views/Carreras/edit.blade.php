    <form method="POST" v-on:submit.prevent="updateCarrera(fillCarrera.Clave)"><!--  -->

        <div class="modal fade" id="editCarrera">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header"><!-- Header -->
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Editar carrera</h4>
                    </div><!--Fin Header -->

                    <div class="modal-body"><!-- Body -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <input type="text" name="ClaveCarrera" id="ClaveCarrera" class="form-control" placeholder="Clave carrera..."  v-model="fillCarrera.Clave">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <input type="text" name="NombreCarrera" id="NombreCarrera" class="form-control" placeholder="Nombre carrera..." v-model="fillCarrera.Nombre">
                                </div>
                            </div>
                        </div>
                        <span v-for="error in errors" class="text-danger">@{{error}}</span>

                    </div><!--Fin Body -->

                    <div class="modal-footer"><!-- Footer -->
                        <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Actualizar</button>
                    </div><!--Fin Footer -->
                </div>
            </div>
        </div>
    </form>

