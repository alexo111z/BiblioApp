<form method="POST" v-on:submit.prevent="createMaterial">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Nuevo material</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="titulo">Titulo</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input type="text" name="titulo" id="titulo" class="form-control" required="" v-model="newMaterial.Titulo">
                                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="claveCarrera">Clave de carrera</label>
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                     <select name="clave" id="clave" class="form-control" required="" v-model="newMaterial.Clave">
                                     @foreach($claves as $clave)
                                     <option value ="{{ $clave->Clave }}"> {{ $clave->Nombre}}</option> 
                                     @endforeach
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="titulo">Año</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                     <?php
                                     $cont = date('Y');
                                     ?>
                                     <select name="year" id="year" class="form-control" required="" v-model="newMaterial.Year">
                                     <?php while ($cont >= 1950) { ?>
                                     <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                                     <?php $cont = ($cont-1); } ?>
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                <label for="ejemplares">Ejemplares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="ejemplares" id="ejemplares" class="form-control" min="1" required="" v-model="newMaterial.Ejemplares">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="tipo">Tipo</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                    <select name="tipo" id="tipo" class="form-control" required="" v-model="newMaterial.Tipo">
                                    <option value="Cd">Cd</option>
                                    <option value="Revista">Revista</option>
                                    <option value="Tesis">Tesis</option>
                                    </select>
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

