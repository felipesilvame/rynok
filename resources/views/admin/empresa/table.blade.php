<div class="table-responsive">
	<table class="table table-bordered table-stripped">
		<thead>
			<th>ID</th>
			<th>Nombre Empresa</th>
			<th>Correo</th>
			<th>Acciones Disponibles</th>
			<th>Administrar</th>
		</thead>
		<tbody>
			@foreach ($empresas as $empresa)
				<tr>
					<td>{!! $empresa->id !!}</td>
					<td>{!! $empresa->nombre !!}</td>
					<td>{!! $empresa->email !!}</td>
					<td>{!! $empresa->acciones_disponibles_p_vender !!}</td>
					<td><a class="btn btn-danger btn-sm" href="{!! route('admin.eliminarEmpresa', null) !!}/{!! $empresa->id !!}"><i class="fa fa-times"></i></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>
