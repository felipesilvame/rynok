@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Nueva empresa</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
            @include('flash::message')
            <div class="row uniform">
                {!! Form::open(['route' => 'admin.storeEmpresa']) !!}

                    @include('admin.empresa.fields')

                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection
