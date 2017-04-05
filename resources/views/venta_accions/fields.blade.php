<div class="row">
	<section class="main" style="text-align: center">
		<h3>Informacion del comprador</h3>
		<p>En caso de existir información del comprador, esto se rellenará automáticamente</p>
	</section>
	<div class="form-group col-sm-6 required">
		{!! Form::label('comprador_rut','RUT',['class' => 'control-label']) !!}
		{!! Form::text('comprador_rut', null, ['class' => 'form-control', 'id' => 'comprador_rut' ]) !!}
	</div>

	<div class="form-group col-sm-6 required">
		{!! Form::label('comprador_nombre','Nombre',['class' => 'control-label']) !!}
		{!! Form::text('comprador_nombre', null, ['class' => 'form-control', 'id' => 'comprador_nombre' ]) !!}
	</div>

	<div class="form-group col-sm-6 required">
		{!! Form::label('comprador_apellido_p','Apellido Paterno',['class' => 'control-label']) !!}
		{!! Form::text('comprador_apellido_p', null, ['class' => 'form-control', 'id' => 'comprador_apellido_p' ]) !!}
	</div>

	<div class="form-group col-sm-6 required">
		{!! Form::label('comprador_apellido_m','Apellido Materno',['class' => 'control-label']) !!}
		{!! Form::text('comprador_apellido_m', null, ['class' => 'form-control', 'id' => 'comprador_apellido_m' ]) !!}
	</div>

	<div class="form-group col-sm-6 required">
		{!! Form::label('comprador_telefono','Teléfono',['class' => 'control-label']) !!}
		{!! Form::text('comprador_telefono', null, ['class' => 'form-control', 'id' => 'comprador_telefono' ]) !!}
	</div>

	<div class="form-group col-sm-6 required">
		{!! Form::label('comprador_email','Email',['class' => 'control-label']) !!}
		{!! Form::text('comprador_email', null, ['class' => 'form-control', 'id' => 'comprador_email' ]) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('comprador_direccion','Dirección',['class' => 'control-label']) !!}
		{!! Form::text('comprador_direccion', null, ['class' => 'form-control', 'id' => 'comprador_direccion' ]) !!}
	</div>	

	<div class="form-group col-sm-6">
		{!! Form::label('comprador_region','Region',['class' => 'control-label']) !!}
		{!! Form::select('comprador_region', $Regiones,null, ['class' => 'form-control', 'id' => 'comprador_region', 'onchange' => 'get_provincias(this)' ]) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('comprador_provincia','Provincia',['class' => 'control-label']) !!}
		{!! Form::select('comprador_provincia',['0' => 'Seleccionar Region...'], null, ['class' => 'form-control', 'id' => 'comprador_provincia', 'onchange' => 'get_comunas(this)' ]) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('comprador_comuna','Comuna',['class' => 'control-label']) !!}
		{!! Form::select('comprador_comuna',['0' => 'Seleccionar Provincia...'], null, ['class' => 'form-control', 'id' => 'comprador_comuna' ]) !!}
	</div>

</div>

<div class="row">
	<section class="main" style="text-align: center">
		<h3>Informacion de la Empresa</h3>
	</section>
	<div class="form-group col-sm-6">
		{!! Form::hidden('vendedor_id', Auth::user()->id,['class' => 'form-control']) !!}
		{!! Form::label('empresa_id','Empresa',['class' => 'control-label']) !!}
		{!! Form::select('empresa_id', $Empresas, null, ['class' => 'form-control' ]) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::label('cantidad_acciones','Cantidad Acciones',['class' => 'control-label']) !!}
		{!! Form::number('cantidad_acciones', 0, ['class' => 'form-control', 'onchange' => 'do_calculation()' ]) !!}
	</div>

	<div class="form-group col-sm-6">
		{!! Form::hidden('valor_total', null, ['class' => 'form-control' ]) !!}
		{!! Form::label('valor_total','Valor Total',['class' => 'control-label']) !!}
		<strong><span><i class="fa fa-dollar"></i></span><span id="valor_total">0</span></strong>
	</div>
	<div class="form-group col-sm-6">
		{!! Form::hidden('valor_mas_comision', null, ['class' => 'form-control' ]) !!}
		{!! Form::label('valor_mas_comision','Total a Pagar',['class' => 'control-label']) !!}
		<strong><span><i class="fa fa-dollar"></i></span><span id="valor_mas_comision">0</span></strong>
	</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'button special btn-primary']) !!}
    <a href="{!! url('/') !!}" class="btn btn-lg btn-default">Cancelar</a>
</div>
{!! Html::script('js/jquery.rut.min.js') !!}
<script>
$(document).ready(function(){
    $("input#comprador_rut").rut({formatOn: 'keyup', ignoreControlKeys: false});
    $('input#comprador_rut').blur(function(){
    	var id = $(this).val();
    	$.getJSON("{!! route('info.get_info_rut', null) !!}" +'/'+ id, function(data, status){
			if (!jQuery.isEmptyObject(data)) {
				$('#comprador_nombre').val(data.nombre);
				$('#comprador_apellido_p').val(data.apellido_paterno);
				$('#comprador_apellido_m').val(data.apellido_materno);
				$('#comprador_telefono').val(data.telefono);
				$('#comprador_email').val(data.email);
				$('#comprador_direccion').val(data.direccion);
				$('#comprador_region').val(data.region);
				var $provincias = $('select[name=comprador_provincia]');
				$provincias.empty();
				$provincias.append('<option value="'+data.provincia+'">'+data.provincia_nombre+'</option>');
				var $comunas = $('select[name=comprador_comuna]');
				$comunas.empty();
				$comunas.append('<option value="'+data.comuna+'">'+data.comuna_nombre+'</option>');
			    //console.log('hay datos!');
			}
    	});
    });
});


function get_provincias(ID){
    var $comunas = $('select[name=comprador_comuna]');
    $comunas.empty();
    $comunas.append('<option id="0" value="0">Seleccionar Comuna...</option>');
    var id = $(ID).val();
    //console.log(id);
    $.getJSON("{!! route('info.get_cities', null) !!}" +'/'+ id, function(data, status){
        var $ciudades = $('select[name=comprador_provincia]');
        $ciudades.empty();
        if(data.length==0) $ciudades.append('<option data-id="" value="">Sin ciudades</option>');
        $.each(data, function(index, element) {       
            $ciudades.append('<option data-id=' + element.id + ' value=' + element.id + '>' + element.provincia_nombre + '</option>');
            });
        get_comunas($ciudades.first());
        });
}

function get_comunas(ID){
    var id = $(ID).val();
    $.getJSON("{!! route('info.get_towns', null) !!}" +'/'+ id, function(data, status){
        var $comunas = $('select[name=comprador_comuna]');
        $comunas.empty();
        if(data.length==0) $comunas.append('<option data-id="0" value="0">Sin comunas</option>');
        $.each(data, function(index, element) {       
            $comunas.append('<option data-id=' + element.id + ' value=' + element.id + '>' + element.comuna_nombre + '</option>');
            });

        });
}
function do_calculation(){
	var acciones = $('input[name=cantidad_acciones]').val();
	var valor_mas_comision = $('input[name=valor_mas_comision]');
	var valor_total = $('input[name=valor_total]');
	var span_valor_total = $('#valor_total');
	var span_valor_mas_comision = $('#valor_mas_comision');
	var comision = 2.0/100.0;
	var monto_total = acciones * 1000;
	var monto_total_mas_comision = monto_total + monto_total*comision;
	valor_total.val(monto_total);
	valor_mas_comision.val(monto_total_mas_comision);
	span_valor_total.text(add_separator(monto_total));
	span_valor_mas_comision.text(add_separator(monto_total_mas_comision));
}
function add_separator(old_data){
	new_data = String(old_data).replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
	return new_data;
}
function rm_separator(old_data){
	new_data = parseInt(old_data.toString().replace(/\./g,""));
	return new_data;
}
</script>