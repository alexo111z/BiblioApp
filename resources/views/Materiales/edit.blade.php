<form method="POST" v-on:submit.prevent="updateMaterial(fillMaterial.Id)">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Editar material</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="titulo">Titulo</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input type="text" name="titulo" id="titulo" class="form-control" required="" v-model="fillMaterial.Titulo">
                                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ClaveCarrera">Clave de carrera</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <select name="clave" id="clave" class="form-control" required="" v-model="fillMaterial.Clave">
                                        <option v-for="carrera in carreras" :value ="carrera.Clave"> @{{carrera.Nombre}}</option> 
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
                                    <select name="year" id="year" class="form-control" required="" v-model="fillMaterial.Year">
                                    <?php while ($cont >= 1950) { ?>
                                    <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                                    <?php $cont = ($cont-1); } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="titulo">Ejemplares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="ejemplares" id="ejemplares" class="form-control" required="" v-model="fillMaterial.Ejemplares">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="titulo">Tipo</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                <select name="tipo" id="tipo" class="form-control" required="" v-model="fillMaterial.Tipo">
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
                    <button type="submit" class="btn btn-primary" style="background-color: #6d356c;"><i class="fa fa-save"></i> Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>

