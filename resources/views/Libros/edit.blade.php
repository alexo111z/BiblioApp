<form method="POST" v-on:submit.prevent="updateLibro(fillLibro.ISBN)">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Editar libro</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="isbn">ISBN</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="isbn" id="isbn" class="form-control" disabled v-model="fillLibro.ISBN">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                        <label for="titulo">Titulo</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input type="text" name="titulo" id="titulo" class="form-control" required v-model="fillLibro.Titulo">
                                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <label for="autor">Autor</label>
                            <div class="form-group">
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                     <select name="idAutor" id="idAutor" class="form-control" required v-model="fillLibro.IdAutor">
                                        <option v-for="autor of autores" :value="autor.IdAutor"> @{{autor.Nombre}} @{{autor.Apellidos}}</option>
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="idEeditorial">Editorial</label>
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                     <select name="idEditorial" id="idEditorial" class="form-control" required v-model="fillLibro.IdEditorial">
                                        <option v-for="editorial of editoriales" :value="editorial.Id"> @{{editorial.Nombre}}</option>
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="carrera">Carrera</label>
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                                     <select name="idCarrera" id="idCarrera" class="form-control" required v-model="fillLibro.IdCarrera">
                                     @foreach($carreras as $carrera)
                                        <option value ="{{ $carrera->Clave }}"> {{ $carrera->Nombre}}</option>
                                     @endforeach
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="dewey">dewey</label>
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                     <select name="dewey" id="dewey" class="form-control" disabled v-model="fillLibro.dewey">
                                     @foreach($deweys as $dewey)
                                        <option value ="{{ $dewey->Id }}"> {{ $dewey->Nombre}}</option>
                                     @endforeach
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="edicion">Edicion</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="edicion" id="edicion" class="form-control" min="1" disabled v-model="fillLibro.Edicion">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="year">Año</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                     <?php
                                     $cont = date('Y');
                                     ?>
                                     <select name="year" id="year" class="form-control" required v-model="fillLibro.Year">
                                     <?php while ($cont >= 1950) { ?>
                                     <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                                     <?php $cont = ($cont-1); } ?>
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="volumen">Volumen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="volumen" id="volumen" class="form-control" min="1" required v-model="fillLibro.Volumen">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="ejemplares">Ejemplares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="ejemplares" id="ejemplares" class="form-control" min="1" max="9999" required v-model="fillLibro.Ejemplares">
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
