<form method="POST" v-on:submit.prevent="createkeep">
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="create">
<div class="modal-dialog modal-xl" role="document">
    
        <div class="modal-content p-2">
        <div class="col-xs-2" style="text-align:right">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="col-xs-2" style="text-align:left">
		<h2 class="display-4" style="display:inline-block">Nuevo Prestamo</h2>
       
        
        
</div>
<h5 class="font-weight-light">Cree Un Nuevo Prestamo </h5>

<hr>



<div class="container">
  <div class="row">
    <div class="col-sm">

    <div class="container">
        

    <div class="form-group"> 
        <label for="full_name_id" class="control-label">Numero De Control</label>
        <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="Num. de control/Num. de nomina">
    </div>
    <br/>    

    <div class="form-group"> 
        <label for="street1_id" class="control-label">Fecha De Inicio</label>
        <input type="text" class="form-control" id="f_inicio" name="street1" value="{{$ldate = date('d-m-Y')}}"   placeholder="{{$ldate = date('d-m-Y')}}" readonly>
    </div> 
    <br/>                     
                            
    

    <div class="form-group"> 
        <label for="diasdeprestamo" class="control-label">Dias De prestamo</label>

        <div class="col-md-3" >
        <select class="form-control button-sm">
        <option value="1">1 día</option>
        <option value="2">2 días</option>
        <option value="3">3 días</option>
        <option value="4">4 días</option>
        <option value="5">5 días</option>
        <option value="6">6 días</option>
        <option value="7">7 días</option>
        </select>
        </div>
    </div> 

                            
    
    
    
    <br/>     
    
    <div class="wrapper" style="text-align:center"> 
      
        <button type="submit" class="btn btn-primary">Prestar Libros</button>
    </div>     
    
</form>
</div>







      
    </div>

    
    <div class="col-sm">



    <div class="row mb-4">
   <div class="col-lg-12">
    
   
    
   <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Buscar Libro:</label>
    <input type="text" class="form-control" id="codigolibro" aria-describedby="emailHelp" placeholder="Codigo de libro">
    
  </div>
    </form>
    
 
  </div>
</div>


    
  


    <div class="card mb-3" style="max-width: 540px;margin-top=10px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="https://e00-telva.uecdn.es/assets/multimedia/imagenes/2017/11/07/15100576219011.jpg" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title text-size">titulo</h4>

        <div class="row">
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Inicial</p></div>
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Final</p></div>  
        </div>
        
        <div class="row">
        <div class="col-sm-5"><p class="card-text">2019-09-09</p></div>
        <div class="col-sm-5"><p class="card-text">2019-09-10</p></div>  
        </div> 
        <p class="card-text"><small class="text-muted">Folio Numero: 444</small></p>
        <p class="card-text"><small class="text-muted">codigo Libro: 23432432443</small></p>
      </div>
    </div>
  </div>
</div>

<div class="card mb-3" style="max-width: 540px;margin-top=10px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="https://images-na.ssl-images-amazon.com/images/I/91nTClkODkL.jpg" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title text-size">titulo</h4>

        <div class="row">
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Inicial</p></div>
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Final</p></div>  
        </div>
        
        <div class="row">
        <div class="col-sm-5"><p class="card-text">2019-09-09</p></div>
        <div class="col-sm-5"><p class="card-text">2019-09-10</p></div>  
        </div> 
        <p class="card-text"><small class="text-muted">Folio Numero: 444</small></p>
        <p class="card-text"><small class="text-muted">codigo Libro: 23432432443</small></p>
      </div>
    </div>
  </div>
</div>

     
    



    
    </div>
    
  </div>
</div>





		  



            

        </div>
    </div>
</div>
</form>
        

        
        
</div>







<!--

<form method="POST" v-on:submit.prevent="updatekeep(fillkeep.folio)">
<div class="modal fade" tabindex="-1" role="dialog" id="edit">
<div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">
            <h5 class="modal-title">Editar Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <label for="renovaciones">crear tarea</label>
                <input type="text" name="renovaciones" class="form-control" v-model="fillkeep.renovaciones">
                <span v-for="error in errors" class="text-danger">@{{error}}</span>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary"  value="Actualizar">
            </div>
        </div>
    </div>
</div>
</form>

-->






<!--
<form method="POST" v-on:submit.prevent="createkeep">
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="create">
<div class="modal-dialog" role="document">
        <div class="modal-content">


            <div class="modal-header">
            <h5 class="modal-title">Nueva Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <label for="Renovation">crear tarea</label>
                <input type="text" name="Renovation" class="form-control" v-model="newkeep">
                <span v-for="error in errors" class="text-danger">@{{error}}</span>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary"  value="Guardar">
            </div>
        </div>
    </div>
</div>
</form>

-->