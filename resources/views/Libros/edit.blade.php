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
                                    <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo" v-model="fillLibro.Titulo">
                                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                                 </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <label for="autor">Autor</label>
                            <div class="form-group">
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                     <select name="idAutor" id="idAutor" class="form-control" v-model="fillLibro.IdAutor">
                                     @foreach($autores as $autor)
                                     <option value ="{{ $autor->IdAutor }}"> {{ $autor->Nombre}}</option> 
                                     @endforeach
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="idEeditorial">Editorial</label>
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                     <select name="idEditorial" id="idEditorial" class="form-control" v-model="fillLibro.IdEditorial">
                                     @foreach($editoriales as $editorial)
                                     <option value ="{{ $editorial->Id }}"> {{ $editorial->Nombre}}</option> 
                                     @endforeach
                                     </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="carrera">Carrera</label>
                                <div class="input-group">
                                     <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                     <select name="idCarrera" id="idCarrera" class="form-control" v-model="fillLibro.IdCarrera">
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
                                     <select name="dewey" id="dewey" class="form-control" v-model="fillLibro.dewey">
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
                                    <input type="number" name="edicion" id="edicion" class="form-control" disabled v-model="fillLibro.Edicion">
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
                                     <select name="year" id="year" class="form-control" v-model="fillLibro.Year">
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
                                    <input type="number" name="volumen" id="volumen" class="form-control" placeholder="Volumen" v-model="fillLibro.Volumen">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="ejemplares">Ejemplares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="ejemplares" id="ejemplares" class="form-control" placeholder="Ejemplares" v-model="fillLibro.Ejemplares">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="ejemDisp">Ejemplares Disponibles</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="ejemDisp" id="ejemDisp" class="form-control" placeholder="EjemDisp" v-model="fillLibro.EjemDisp">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="imagen">Imagen</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="text" name="imagen" id="imagen" class="form-control" placeholder="Imagen" v-model="fillLibro.Imagen">
                                </div>
                             </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                             <label for="fechaRegistro">Fecha de Registro</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="date" name="fechaRegistro" id="fechaRegistro" class="form-control" placeholder="Fecga de Registro" v-model="fillLibro.FechaRegistro">
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
