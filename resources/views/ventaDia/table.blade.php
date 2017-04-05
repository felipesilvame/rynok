<div class="table-responsive">
	<table class="table table-bordered table-stripped">
		<thead>
			<th>Fecha</th>
			<th>RUT</th>
			<th>Nombre</th>
			<th>Empresa</th>
			<th>Acciones Compradas</th>
			<th>Vendedor</th>
		</thead>
		<tbody>
			@foreach ($ventaAcciones as $ventaAccion)
				<tr>
					<td>{!! date('d F Y, H:i:s', strtotime($ventaAccion->created_at)) !!}</td>
					<td>{!! $ventaAccion->comprador_rut !!}</td>
					<td>{!! $ventaAccion->comprador_nombre !!} {!! $ventaAccion->comprador_apellido_p !!}</td>
					<td>{!! $ventaAccion->Empresa == null ? $ventaAccion->empresa_id : $ventaAccion->Empresa->nombre !!}</td>
					<td>{!! $ventaAccion->cantidad_acciones !!}</td>
					<td>{!! $ventaAccion->vendedor_id != null ? $ventaAccion->Vendedor->nombre : null !!}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="col-md-12 center-block text-center">
	{{ $ventaAcciones->links() }}
</div>	
