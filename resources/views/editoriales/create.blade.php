<form method="POST" v-on:submit.prevent="createEditorial">
    <div class="modal fade" id="create3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Nueva editorial</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la editorial" v-model="newEditorial.Nombre">
                            </div>
                        </div>
                    </div>
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
