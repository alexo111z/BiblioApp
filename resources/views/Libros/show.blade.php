<form method="POST" v-on:submit.prevent="showLibro(fillLibro.ISBN)">
    <div class="modal fade" id="show">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Detalles libro</h4>
                </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <img
                                    :src="'data:image/png;base64,' + fillLibro.Imagen"
                                    width="290"
                                    alt="barcode"
                                    style="position: relative; margin: 20px 0 20px calc(50% - 145px);">
                            </div>
                             <div class="col-md-12">
                                 <h5 style="font-weight:light;margin-left:2rem"><b>ISBN:</b> @{{fillLibro.ISBN}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Titulo:</b> @{{fillLibro.Titulo}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Autor:</b> @{{fillLibro.IdAutor}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Editorial:</b> @{{fillLibro.IdEditorial}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Carrera:</b> @{{fillLibro.IdCarrera}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>dewey:</b> @{{fillLibro.dewey}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Edicion:</b> @{{fillLibro.Edicion}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Año:</b> @{{fillLibro.Year}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Volumen:</b> @{{fillLibro.Volumen}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Ejemplares:</b> @{{fillLibro.Ejemplares}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Ejem. Disponibles:</b> @{{fillLibro.EjemDisp}}</h5>
                                 <h5 style="font-weight:light;margin-left:2rem"><b>Fecha de registro:</b> @{{fillLibro.FechaRegistro}}</h5>
                             </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>
