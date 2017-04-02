@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Nuevo Usuario</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
            @include('flash::message')
            <div class="row uniform">
                {!! Form::open(['route' => 'admin.storeUsuario']) !!}

                    @include('admin.usuario.fields')

                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection
