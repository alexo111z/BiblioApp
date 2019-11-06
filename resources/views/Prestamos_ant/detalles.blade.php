<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="col-xs-2" style="text-align:left">
		<h2 class="display-4" style="display:inline-block">
            Detalles De Prestamos
			
        </h2>
        <a class="btn btn-primary mr-1" href="{{url('prestamos')}}" style="float:right;margin:10px;margin-right:10px"><-Regresar</a>
        @if($vigente=='Expirado')

@else
<a class="btn btn-success mr-1" href="{{url('prestamos')}}" style="float:right;margin:10px;margin-right:10px">Finalizar Prestamo</a>
@endif

        
        
</div>
<h5 class="font-weight-light">Libros Prestados A {{$nombre}} Con Folio Numero {{$folio}}</h5>

@if($vigente=='Expirado')
<h5 class="font-weight-light text-danger">Estado: {{$vigente}}</h5>
@else
<h5 class="font-weight-light text-success">Estado: {{$vigente}}</h5>
@endif


<hr>
<nav class="navbar navbar-light bg-light">
@foreach($dataa as $data)
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="{{$data->imagen}}" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title text-size">{{$data->titulo}}</h4>

        <div class="row">
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Inicial</p></div>
        <div class="col-sm-5 font-weight-bold"><p class="card-text">Fecha Final</p></div>  
        </div>
        
        <div class="row">
        <div class="col-sm-5"><p class="card-text">{{$data->fecha_inicio}}</p></div>
        <div class="col-sm-5"><p class="card-text">{{$data->fecha_final}}</p></div>  
        </div> 
        
        
        <br/>
        <br/>
        <p class="card-text"><small class="text-muted">Folio Numero: {{$data->folio}}</small></p>
        <p class="card-text"><small class="text-muted">codigo Libro: {{$data->codigo}}</small></p>
      </div>
    </div>
  </div>
</div>

@endforeach			  
                    