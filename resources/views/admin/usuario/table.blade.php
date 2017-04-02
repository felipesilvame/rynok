<div class="table-responsive">
	<table class="table table-bordered table-stripped">
		<thead>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Empresa</th>
			<th>Perfil</th>
			<th>Email</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach ($usuarios as $usuario)
				<tr>
					<td>{!! $usuario->nombre !!}</td>
					<td>{!! $usuario->apellido_paterno !!} {!! $usuario->apellido_materno !!}</td>
					<td>{!! $usuario->empresa_id != null ? $usuario->Empresa->nombre : null !!}</td>
					<td>{!! $usuario->Perfil->descripcion !!}</td>
					<td>{!! $usuario->email !!}</td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>	
</div>
