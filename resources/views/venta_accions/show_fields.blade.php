<div class="form form-inline container row">
	<!-- Id Field -->
	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('id', 'ID Transacción:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->id !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('fecha', 'Fecha:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! date('d F Y, H:m:s', strtotime($ventaAccion->updated_at)) !!}</span></strong>
	   </div>
	</div>
	<!-- Id Field -->
	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('comprador_rut', 'RUT Comprador:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->comprador_rut !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('comprador_nombre', 'Comprador:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->comprador_nombre !!} {!! $ventaAccion->comprador_apellido_p !!} {!! $ventaAccion->comprador_apellido_m !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('comprador_email', 'Email Comprador:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->comprador_email !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('comprador_telefono', 'Teléfono Comprador:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->comprador_telefono !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('empresa_id', 'Empresa:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->Empresa->nombre !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('cantidad_acciones', 'Cantidad Acciones:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>{!! $ventaAccion->cantidad_acciones !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('valor_total', 'Valor total:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>$ {!! $ventaAccion->valor_total !!}</span></strong>
	   </div>
	</div>

	<div class="form-group col-xs-12 col-md-6 col-md-offset-3">
	   <div class="col-xs-6">
	   		{!! Form::label('total_a_pagar', 'Monto pagado:')!!}
	   </div>
	   <div class="col-xs-6">
	   		<strong><span>$ {!! $ventaAccion->valor_mas_comision !!}</span></strong>
	   </div>
	</div>
</div>
