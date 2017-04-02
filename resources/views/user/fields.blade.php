<div class="row">
    <section class="col-xs-12">
        <h3>Mi perfil</h3>
    </section>
</div>
<div class="row">
    <div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
        {!! Form::label('nombre', 'Nombre:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('nombre', $user->nombre, ['class' => 'form-control field'])  !!}
        @if ($errors->has('nombre'))
            <span class="help-block">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('email', $user->email, ['class' => 'form-control field'])  !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xs-12 form-group required has-feedback{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
        {!! Form::label('apellido_paterno', 'Apellido Paterno:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('apellido_paterno', $user->apellido_paterno, ['class' => 'form-control field'])  !!}
        @if ($errors->has('apellido_paterno'))
            <span class="help-block">
                <strong>{{ $errors->first('apellido_paterno') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-6 col-xs-12 form-group has-feedback{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
        {!! Form::label('apellido_materno', 'Apellido Materno:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('apellido_materno', $user->apellido_materno, ['class' => 'form-control field'])  !!}
        @if ($errors->has('apellido_materno'))
            <span class="help-block">
                <strong>{{ $errors->first('apellido_materno') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xs-12 form-group">
        {!! Form::label('empresa', 'Empresa:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('empresa_id', $user->Empresa == null ? null : $user->Empresa->nombre, ['class' => 'form-control field disabled', 'disabled' => 'disabled'])  !!}
    </div>
</div>
<div class="row">
    <section class="col-xs-12">
        <h3>Cambiar Contraseña</h3>
    </section>
    <div class="col-md-6 col-xs-12 form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Contraseña:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('password', null, ['class' => 'form-control field'])  !!}
    </div>
    <div class="col-md-6 col-xs-12 form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation', 'Confirme Contraseña:', ['class' => 'control-label col-form-label']) !!}
        {!! Form::text('password_confirmation', null, ['class' => 'form-control field'])  !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn special']) !!}
        <a href="{!! url('/home') !!}" class="btn default">Cancelar</a>
    </div>
</div>