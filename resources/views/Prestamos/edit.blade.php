<form method="POST" v-on:submit.prevent="terminarprestamo(filldetails.folio)">

<div class="modal fade" id="detalles">
    <div class="modal-dialog modal-lg" style="width:70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <div class="row">
                <div class="col-md-8">
          <h1>Detalles De Prestamo</h1>
          </div>
          <div class="col-md-4" v-if="filldetails.estado=='Vigente'">
          <button type="submit" class="btn btn-primary" style="background-color: #6d356c;margin-left:100px;"><i class="fa fa-book"></i> Terminar Prestamo</button>
          </div>
          </div>
            </div>
            <div class="row" style="margin-left:2rem;">
                <div class="basic-inf">
                    <div class="col-md-12">
                        <h4>Folio del prestamo: <strong>@{{filldetails.folio}}</strong></h4>    
                    </div>
                    <div class="col-md-12">
                        <h4>Prestatario</h4>    
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div> 
                            <input type="text" v-model="filldetails.nombre+' '+filldetails.apellidos" class="form-control" readonly>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="row" style="margin-left:2rem;">
                <div class="estados" style="margin-top: 1rem;">
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label>Estado</label>
                            </div> 
    

                            <div style="color:orange" v-if="filldetails.estado=='Vigente'">
                                <input type="text" value="Vigente" class="form-control" readonly>
                            </div>
                            <div style="color:green" v-if="filldetails.estado=='Entregado'">
                                <input type="text" value="Entregado" class="form-control" readonly>
                            </div>
                            <div style="color:red" v-if="filldetails.estado=='Expirado'">
                                <input type="text" value="Expirado" class="form-control" readonly>
                            </div>
                            


                        </div>
                    </div>
                </div>
            </div>
            
            <div class="fechas-inf">
                <div class="row" style="margin-left:2rem; margin-top: 1rem;">
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label>Fecha de inicio</label>
                            </div> 
                            <input type="text" v-model="filldetails.fecha_inicio" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label>Fecha de término</label>
                            </div> 
                            <input type="text" v-model="filldetails.fecha_final" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left:2rem; margin-top: 1rem;">
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label>Entregado</label>
                            </div>
                            <div>
                            <input type="text" v-model="filldetails.fecha_entrega" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="modal-body">                  
                    <div class="row">
                        <div v-for="detail in detailsdata" class="col-md-4 col-md-4">
                            <div class="thumbnail ">          
                                <img :src="detail.imagen">
                                <div class="caption">
                                    <h4 style="font-weight:bold;">@{{detail.titulo}}</h4>
                                    <hr>
                                    <h5>Codigo Libro: @{{detail.codigo}}</h5>
                                    <h5>Editorial: @{{detail.nombreeditorial}}</h5>
                                    <h5>Autor: @{{detail.nombreautor+' '+detail.apellidoautor}}</h5>
                                    <h5>Año: @{{detail.year}}</h5>
                                </div>
                            </div>
                        </div>                  
                    </div><!--fincard-->                      
                </div>
            </div>
        </div>
    </div>
</div>
        

    

</form>


