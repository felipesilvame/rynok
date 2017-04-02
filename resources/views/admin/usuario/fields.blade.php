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

	<div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
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
	<div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
		{!! Form::label('apellido_paterno', 'Apellido Paterno:', ['class' => 'control-label']) !!}
		{!! Form::text('apellido_paterno', null, ['class' => 'form-control'])  !!}
        @if ($errors->has('apellido_paterno'))
	        <span class="help-block">
	            <strong>{{ $errors->first('apellido_paterno') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="col-md-6 col-xs-12 form-group has-feedback{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
		{!! Form::label('apellido_materno', 'Apellido Materno:', ['class' => 'control-label']) !!}
		{!! Form::text('apellido_materno', null, ['class' => 'form-control'])  !!}
        @if ($errors->has('apellido_materno'))
	        <span class="help-block">
	            <strong>{{ $errors->first('apellido_materno') }}</strong>
	        </span>
	    @endif
	</div>		
</div>
<div class="row">
	<div class="col-md-3 col-xs-6 form-group has-feedback{{ $errors->has('empresa_id') ? ' has-error' : '' }}">
		{!! Form::label('empresa_id', 'Empresa:', ['class' => 'control-label']) !!}
		{!! Form::select('empresa_id', $empresas, 0,['class' => 'form-control'])  !!}
        @if ($errors->has('empresa_id'))
	        <span class="help-block">
	            <strong>{{ $errors->first('empresa_id') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="col-md-3 col-xs-6 form-group has-feedback{{ $errors->has('perfil_id') ? ' has-error' : '' }}">
		{!! Form::label('perfil_id', 'Perfil:', ['class' => 'control-label']) !!}
		{!! Form::select('perfil_id', $perfiles, 4, ['class' => 'form-control'])  !!}
        @if ($errors->has('perfil_id'))
	        <span class="help-block">
	            <strong>{{ $errors->first('perfil_id') }}</strong>
	        </span>
	    @endif
	</div>
	<div class="col-md-3 col-xs-6 form-group required has-feedback{{ $errors->has('habilitado') ? ' has-error' : '' }}">
		{!! Form::label('habilitado', 'Habilitado:', ['class' => 'control-label']) !!}
		{!! Form::select('habilitado', ['0' => 'No', '1' => 'Si'], 1, ['class' => 'form-control'])  !!}
        @if ($errors->has('habilitado'))
	        <span class="help-block">
	            <strong>{{ $errors->first('habilitado') }}</strong>
	        </span>
	    @endif
	</div>			
</div>
<div class="row">
	<div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
		{!! Form::label('password', 'Contraseña:', ['class' => 'control-label col-form-label']) !!}
		{!! Form::password('password', null, ['class' => 'form-control field'])  !!}
        @if ($errors->has('password'))
	        <span class="help-block">
	            <strong>{{ $errors->first('password') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
		{!! Form::label('password_confirmation', 'Confirme Contraseña:', ['class' => 'control-label']) !!}
		{!! Form::password('password_confirmation', null, ['class' => 'form-control'])  !!}
        @if ($errors->has('password_confirmation'))
	        <span class="help-block">
	            <strong>{{ $errors->first('password_confirmation') }}</strong>
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
