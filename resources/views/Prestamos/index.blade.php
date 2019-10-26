<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="col-xs-12">
		<h2>
            Lista de Prestamos
            
            {{session(['idusuario' => '1'])}}
			
		</h2>
        <hr>
<nav class="navbar navbar-light bg-light">
  <form method="POST" class="form-inline" action="{{ route('buscarprestamos') }}">
  {{csrf_field()}}  
    <input class="form-control mr-sm-2" type="search" name="name" placeholder="Numero De Control" aria-label="Search">
    <button class="btn btn-outline-success my-4 my-sm-0" type="submit">Buscar</button>
  </form>
</nav>
		
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					          <th>Folio</th>
                    <th>Prestatario</th>
                    <th>F_inicio</th>
                    <th>F_Final</th>
                    <th>F_entrega</th>
                    <th>renovaciones</th> 
                    <th></th>                                     
                    <th colspan="2"><a class="btn btn-success" href="{{url('/prestamos/create')}}">Nuevo Prestamo</a></th>				</tr>
			</thead>
			<tbody>
                @if(isset($datas))
                    @foreach($datas as $data)
				<tr>
                    <td>{{ $data->folio }}</td>
                    <td>{{ $data->nombre.' '.$data->apellidos }}</td>
                    <td>{{ $data->fecha_inicio }}</td>
                    <td>{{ $data->fecha_final }}</td>
                    <td>{{ $data->fecha_entrega }}</td>
                    <td>{{ $data->renovaciones }}</td>
                   
            <td>
                <a class="btn btn-secondary" href="{{url('/prestamos/'.$data->folio.'/ver')}}">
                Detalles
                </a>           </td>
                    <td>
                <a class="btn btn-primary" href="{{url('/prestamos/'.$data->folio.'/edit')}}">
                Editar
                </a>           </td>
<td>            <form method="Post" action="{{url('/prestamos/'.$data->folio)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" onclick="return confirm('Borrar?');" class="btn btn-danger">Borrar</button>
                
            </form>
            </td>
            
        </tr>
        
				@endforeach
			</tbody>
        </table>
        
        {{$datas->links()}}

                @endif

        
				       
	</div>


