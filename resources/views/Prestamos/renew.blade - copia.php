<form method="POST" v-on:submit.prevent="renewmoredays(fillrenew.folio)">
<div class="modal fade" id="renew">
<div class="modal-dialog modal-centered" role="document">
    
        <div class="modal-content p-4">
        <div class="col-xs-2" style="text-align:right">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="col-xs-2" style="text-align:left">
        <h2 class="display-4" style="display:inline-block">Renovar Prestamo</h2>
</div>
       
        
        <h5 class="font-weight-light">Renovar Prestamo Para @{{fillrenew.nombre+' '+fillrenew.apellidos}}</h5>


<hr>


        <h6>Fecha Actual De Vencimiento</h6>
        <input type="text" class="form-control" v-model="fillrenew.fecha_final" readonly> 
        <br/>    

   
  <h6 style="text-align:center;">Añadir Mas Dias De Prestamo</h6>
  <select id="selectdays" class="form-control">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>      
        </select>
        <br/>
        <input type="submit" value="Renovar" class="btn btn-success">
</div>
</div>    
</div>
</form> 

