<form method="POST" v-on:submit.prevent="createAutor">
        <div class="modal fade" id="create">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4>Nuevo autor</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre (s)" v-model="nombre">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" v-model="apellidos">
                                </div>
                            </div>
                        </div>
                        <span v-for="error in errors" class="text-danger">@{{error}}</span>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
