<form method="POST" v-on:submit.prevent="updatekeep(fillkeep.folio)">

<div class="modal fade" id="detalles">
    <div class="modal-dialog modal-lg" style="width:70%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
          <h1>Detalles De Prestamo</h1>
        </div>
        <h3 style="margin-left:2rem;">Libros Prestados A @{{filldetails.nombre+' '+filldetails.apellidos}} Con Folio Numero: @{{filldetails.folio}} </h3>
        
        <h4 style="color:green;margin-left:2rem" v-if="filldetails.nombre=='Hector'">Estado: Vigente </h4>
        <h4 style="color:red;margin-left:2rem" v-else>Estado: Cancelado </h4>


        <h5 style="font-weight:light;margin-left:2rem">Fecha De Inicio: @{{filldetails.fecha_inicio}}</h5>
        <h5 style="font-weight:light;margin-left:2rem">Fecha De Término: @{{filldetails.fecha_final}}</h5>
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


