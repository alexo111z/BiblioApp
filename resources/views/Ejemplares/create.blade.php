<form method="POST" v-on:submit.prevent="createEjemplar">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Nuevo Ejemplar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="codigo">Codigo</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="codigo" id="codigo" class="form-control" min="1" max="99999999999999999999" required v-model="newEjemplar.Codigo">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="isbn">ISBN</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="isbn" id="isbn" class="form-control" min="1" max="99999999999999999999" required v-model="newEjemplar.ISBN">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                        <label for="cd">CD</label>
                            <div class="form-group">
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                     <select name="cd" id="cd" class="form-control" required v-model="newEjemplar.CD">
                                     <option value="0">No</option>
                                     <option value="1">Si</option>
                                     </select>
                                </div>
                            </div>
                        </div>                 
                      
                    </div>
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i
                            class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
