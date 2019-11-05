    <form method="POST" v-on:submit.prevent="createCarrera"><!-- v-on:submit.prevent="createCarrera" -->

        <div class="modal fade" id="createCarrera">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header"><!-- Header -->
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Nueva carrera</h4>
                    </div><!--Fin Header -->

                    <div class="modal-body"><!-- Body -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <input type="text" name="ClaveCarrera" id="ClaveCarrera" class="form-control" placeholder="Clave carrera..." v-model="ClaveCarrera">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <input type="text" name="NombreCarrera" id="NombreCarrera" class="form-control" placeholder="Nombre carrera..." v-model="NombreCarrera">
                                </div>
                            </div>
                        </div>
                        <span v-for="error in errors" class="text-danger">@{{error}}</span>

                    </div><!--Fin Body -->

                    <div class="modal-footer"><!-- Footer -->
                        <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Guardar</button>
                    </div><!--Fin Footer -->
                </div>
            </div>
        </div>
    </form>
