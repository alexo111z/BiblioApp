	<div class="col-xs-12 col-sm-8">
		<h2>
			Lista de productos
			
		</h2>
		<hr>
		
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th width="20px">ID</th>
					<th>Nombre del producto</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($datas as $data)
				<tr>
					<td>{{ $data->nombre }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
       
	</div>


