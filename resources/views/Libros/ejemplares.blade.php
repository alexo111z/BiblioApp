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
                                    <select name="ejemplar" id="ejemplar" class="form-control" >
                                    <option v-for="ejemplar of ejemplares" :value="ejemplar.Codigo"> @{{ejemplar.Codigo}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>
                <div class="modal-footer">
                            <a href="javascript:void()" class="btn btn-warning btn-sm" style="background-color: #2da19a; border-color: #2da19a;" v-on:click.prevent="editEjemplar(ejemplar)" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-edit"></i></a>
                            <td width="10px">
                        <a href="javascript:void()" class="btn btn-danger btn-sm" v-on:click.prevent="deleteEjemplar(ejemplar)"><i class="fa fa-user-times"></i></a>
                    </td>
                </div>
            </div>
        </div>
    </div>

