@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Portal Empresas</h2>
    </header>
    <div id="main" class="">
        <!-- Inicio de Sesión -->
        <section id="content container" class="main">
            <span class="image main"><img src="images/portada_rynok.jpg" alt="" /></span>
                <h2>Inicio de Sesión</h2>
                <div class="row">
                    @include('flash::message')
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    <div class="row uniform">
                            {{ csrf_field() }}

                            <div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                <label for="remember">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="actions col-md-8 col-md-offset-4">
                        <button type="submit" class="special">
                            Iniciar Sesión
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Olvidaste la contraseña?
                        </a>
                    </div>
                </form>
        </section>

    </div>
</div>

@endsection
