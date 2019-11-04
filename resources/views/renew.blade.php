<form method="POST" v-on:submit.prevent="renewmoredays(fillkeep.folio)">
<div class="modal fade bd-example-modal-centered" tabindex="-1" role="dialog" id="renew">
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
       
        
        <h5 class="font-weight-light">Renovar Prestamo Para xPalominox</h5>


<hr>
        <h6>Fecha Actual</h6>
        <input type="text" class="form-control" placeholder="2019-02-21">
        <br/>    

   
  <h6 style="text-align:center;">Añadir Mas Dias De Prestamo</h6>
  <select class="form-control">
        <option value="1">1</option>
        <option value="1">2</option>
        <option value="1">3</option>
        </select>

        <br/>
        <input type="submit" value="Renovar" class="btn btn-success">
</div>
</div>    
</div>
</form> 

