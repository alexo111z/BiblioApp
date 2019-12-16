
<div class="modal fade" id="detalles">
    <div class="modal-dialog modal-lg" style="width:70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Detalles del Adeudo</h4>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-left:2rem;">
                <div class="basic-inf">
                    <div class="col-md-12">
                        <h4>Folio del prestamo: <strong>@{{fillAdeudos.folio}}</strong></h4>    
                    </div>
                    <div class="col-md-12">
                        <h4>Prestatario</h4>    
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div> 
                            <input type="text" v-model="fillAdeudos.fullname" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label>#</label>
                            </div> 
                            <input type="text" v-model="fillAdeudos.control" class="form-control" readonly>
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
                            <div v-if="fillAdeudos.existe == 1">
                                <input type="text" value="Adeudo" class="form-control" readonly>
                            </div>
                            <div v-else>
                                <input type="text" value="Pagado" class="form-control" readonly>
                            </div>
                            <div class="input-group-addon" v-if="fillAdeudos.existe == 0">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="input-group-addon" v-else>
                                <i class="fa fa-close"></i>
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
                            <input type="text" v-model="fillAdeudos.fecha_inicio" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <label>Fecha de término</label>
                            </div> 
                            <input type="text" v-model="fillAdeudos.fecha_final" class="form-control" readonly>
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
                                <input type="text" v-model="fillAdeudos.fecha_entrega" class="form-control" readonly>
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
        