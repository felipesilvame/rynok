@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Perfil</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
            @include('flash::message')
            <div class="row uniform">
                {!! Form::open(['route' => 'perfil.store']) !!}
                    @include('user.fields')
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection