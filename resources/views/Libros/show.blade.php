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
                            <div class="col-xs-6">
                                    <img src="http://127.0.0.1:8000/images/template.png" width="280" >
                            </div>    
                            <div class="col-xs-6">            
                             <h5><b>ISBN:</b> @{{fillLibro.ISBN}}</h5>
                             <h5><b>Titulo:</b> @{{fillLibro.Titulo}}</h5>
                             <h5><b>Autor:</b> @{{fillLibro.IdAutor}}</h5>
                             <h5><b>Editorial:</b> @{{fillLibro.IdEditorial}}</h5>
                             <h5><b>Carrera:</b> @{{fillLibro.IdCarrera}}</h5>
                             <h5><b>dewey:</b> @{{fillLibro.dewey}}</h5>
                             <h5><b>Edicion:</b> @{{fillLibro.Edicion}}</h5>
                             <h5><b>Año:</b> @{{fillLibro.Year}}</h5>
                             <h5><b>Volumen:</b> @{{fillLibro.Volumen}}</h5>
                             <h5><b>Ejemplares:</b> @{{fillLibro.Ejemplares}}</h5>
                             <h5><b>Ejem. Disponibles:</b> @{{fillLibro.EjemDisp}}</h5>
                             <h5><b>CD disponible:</b>/h5>
                             if(fillLibro.CD=1){
                                Si
                             }  else{
                                No
                             }
                             <h5><b>Fecha de registro:</b> @{{fillLibro.FechaRegistro}}</h5>  
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</form>
