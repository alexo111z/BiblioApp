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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dewey">Ejemplares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select name="ejemplar" id="ejemplar" class="form-control" required
                                        v-model="fillLibro.Ejemplares">
                                        @foreach($ejemplares as $ejemplar)
                                        <option value="{{ $ejemplar->Codigo }}"> {{ $ejemplar->Codigo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i
                            class="fa fa-pencil"></i>Editar</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i
                            class="fa fa-save"></i>Eliminar</button>
                </div>
            </div>
        </div>
    </div>

