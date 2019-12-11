<form method="POST" v-on:submit.prevent="createLibro" enctype="multipart/form-data">
    <div class="modal fade" id="create2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Nuevo libro</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="isbn" id="isbn" class="form-control" required
                                        v-model="newLibro.ISBN">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="titulo">Titulo</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input type="text" name="titulo" id="titulo" class="form-control" required
                                        v-model="newLibro.Titulo">
                                </div>
                                <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="autor">Autor</label>
                            <a href=""   data-toggle="modal" data-target="#create">
                    <i class="fa fa-pencil"></i> Registrar autor</a>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <select name="idAutor" id="idAutor" class="form-control" required
                                        v-model="newLibro.IdAutor">
                                        @foreach($autores as $autor)
                                        <option value="{{ $autor->IdAutor }}"> {{ $autor->Nombre}}
                                            {{ $autor->Apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="idEeditorial">Editorial</label>
                                <a href="" data-toggle="modal" data-target="#createEditorials">
                    <i class="fa fa-pencil"></i> Registrar editorial </a>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>
                                    <select name="idEditorial" id="idEditorial" class="form-control" required
                                        v-model="newLibro.IdEditorial">
                                        @foreach($editoriales as $editorial)
                                        <option value="{{ $editorial->Id }}"> {{ $editorial->Nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-graduation-cap"></i></div>
                                    <select name="idCarrera" id="idCarrera" class="form-control" required
                                        v-model="newLibro.IdCarrera">
                                        @foreach($carreras as $carrera)
                                        <option value="{{ $carrera->Clave }}"> {{ $carrera->Nombre}}</option>
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
                                    <select name="dewey" id="dewey" class="form-control" required
                                        v-model="newLibro.dewey">
                                        @foreach($deweys as $dewey)
                                        <option value="{{ $dewey->Id }}"> {{ $dewey->Nombre}}</option>
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
                                    <input type="number" name="edicion" id="edicion" class="form-control" min="1" required
                                        v-model="newLibro.Edicion">
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
                                    <select name="year" id="year" class="form-control" required v-model="newLibro.Year">
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
                                    <input type="number" name="volumen" id="volumen" class="form-control" min="1" required
                                        v-model="newLibro.Volumen">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ejemplares">Ejemplares</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></div>
                                    <input type="number" name="ejemplares" id="ejemplares" class="form-control" min="1" required
                                        v-model="newLibro.Ejemplares">
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