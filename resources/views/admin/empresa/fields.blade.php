<div class="row">
	<div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
		{!! Form::label('nombre', 'Nombre:', ['class' => 'control-label col-form-label']) !!}
		{!! Form::text('nombre', null, ['class' => 'form-control field'])  !!}
        @if ($errors->has('nombre'))
	        <span class="help-block">
	            <strong>{{ $errors->first('nombre') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="col-md-6 col-xs-12 form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
		{!! Form::label('email', 'Correo Electrónico:', ['class' => 'control-label']) !!}
		{!! Form::text('email', null, ['class' => 'form-control'])  !!}
        @if ($errors->has('email'))
	        <span class="help-block">
	            <strong>{{ $errors->first('email') }}</strong>
	        </span>
	    @endif
	</div>
</div>
<div class="row">
	<div class="col-md-3 col-xs-6 form-group required has-feedback{{ $errors->has('acciones_disponibles_p_vender') ? ' has-error' : '' }}">
		{!! Form::label('acciones_disponibles_p_vender', 'Acciones Iniciales:', ['class' => 'control-label']) !!}
		{!! Form::text('acciones_disponibles_p_vender', 500, ['class' => 'form-control'])  !!}
        @if ($errors->has('acciones_disponibles_p_vender'))
	        <span class="help-block">
	            <strong>{{ $errors->first('acciones_disponibles_p_vender') }}</strong>
	        </span>
	    @endif
	</div>	
</div>
<div class="row">
	<div class="form-group col-sm-12">
	    {!! Form::submit('Guardar', ['class' => 'special']) !!}
	    <a href="{!! url('/home') !!}" class="btn default">Cancelar</a>
	</div>	
</div>
