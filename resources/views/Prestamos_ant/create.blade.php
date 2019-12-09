<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  
  
<div class="col-xs-2" style="text-align:left">
		<h2 class="display-4" style="display:inline-block">
            Nuevo Prestamo
			
        </h2>
        <a class="btn btn-primary mr-1" href="{{url('prestamos')}}" style="float:right;margin:10px;margin-right:10px"><-Regresar</a>
        
        
</div>
<h5 class="font-weight-light">Cree Un Nuevo Prestamo </h5>

<hr>



<div class="container">
  <div class="row">
    <div class="col-sm">

    <div class="container">
<form>

    <div class="form-group"> 
        <label for="full_name_id" class="control-label">Numero De Control</label>
        <input type="text" class="form-control" id="full_name_id" name="full_name">
    </div>    

    <div class="form-group"> 
        <label for="street1_id" class="control-label">Fecha De Inicio</label>
        <input type="text" class="form-control" id="street1_id" name="street1" placeholder="{{$ldate = date('d-m-Y')}}" readonly>
    </div>                    
                            
    

    <div class="form-group"> 
        <label for="city_id" class="control-label">City</label>
        <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
    </div>                                    
                            
    <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Carrera</label>
        <select class="form-control" id="carrera">
            <option value="1">ITICS</option>           
        </select>                    
    </div>
    
    <div class="form-group"> <!-- Zip Code-->
        <label for="zip_id" class="control-label">Zip Code</label>
        <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
    </div>        
    
    <div class="form-group"> <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Hacer Prestamo</button>
    </div>     
    
</form>
</div>







      
    </div>

    
    <div class="col-sm">



    <div class="row mb-4">
   <div class="col-lg-12">
    <div class="input-group input-group-lg">
    <form class="" action=""></form>
      <input type="text" class="form-control input-lg" id="idlibro" placeholder="Codigo Libro">
      <span class="input-group-btn">
        <button class="btn btn-outline-success btn-lg" type="submit">Buscar</button>
        
      </span>
    </form>
    </div>
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









    



