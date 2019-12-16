<form method="POST" v-on:submit.prevent="updateEjemplar(fillEjemplar.Codigo)">
    <div class="modal fade" id="editEjemplar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Editar ejemplar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="codigo">Codigo</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="codigo" id="codigo" class="form-control" min="1" max="99999999999999999999" disabled v-model="fillEjemplar.Codigo">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="isbn">ISBN</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="isbn" id="isbn" class="form-control" min="1" max="99999999999999999999" disabled v-model="fillEjemplar.ISBN">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                        <label for="cd">CD</label>
                            <div class="form-group">
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-circle"></i></div>
                                     <select name="cd" id="cd" class="form-control" required v-model="fillEjemplar.CD">
                                     <option value="0">No</option>
                                     <option value="1">Si</option>
                                     </select>
                                </div>
                            </div>
                        </div>                 
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="fechaRegistro">Fecha de Registro</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="date" name="fechaRegistro" id="fechaRegistro" class="form-control" disabled v-model="fillEjemplar.FechaRegistro">
                                </div>
                             </div>
                        </div>
                    </div>
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>
