
<div class="modal fade" id="detalles">
    <div class="modal-dialog modal-lg" style="width:70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <div class="row">
                    <div class="col-md-8">
                        <h1>Detalles del Adeudo</h1>
                    </div>
                </div>
            </div>
            <div class="basic-inf">
                <h3 style="margin-left:2rem;">
                    Libros prestados a: <strong>@{{fillAdeudos.nombre+' '+fillAdeudos.apellidos}}.</strong> 
                    Con número de folio: <strong>@{{fillAdeudos.folio}}</strong>
                </h3>
            </div>
            <div class="estados">
                <h4 style="margin-left:2rem" v-if="fillAdeudos.existe == 1">Estado: <strong class="text-danger">Adeudo</strong></h4>
                <h4 style="margin-left:2rem" v-if="fillAdeudos.existe == 0">Estado: <label class="text-success">Pagado</label></h4>
            </div>
            <div class="fechas-inf">
                <h5 style="font-weight:light;margin-left:2rem">Fecha de inicio: @{{fillAdeudos.fecha_inicio}}</h5>
                <h5 style="font-weight:light;margin-left:2rem">Fecha de término: @{{fillAdeudos.fecha_final}}</h5>
                <h5 style="font-weight:light;margin-left:2rem" v-if="fillAdeudos.fecha_entrega !=null">Entregado el: @{{fillAdeudos.fecha_entrega}}</h5>
                <h5 style="font-weight:light;margin-left:2rem" v-else>Entregado el: <strong class="text-danger">No Entregado</strong></h5>
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
        