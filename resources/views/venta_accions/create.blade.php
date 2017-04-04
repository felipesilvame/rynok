@extends('layouts.app')


@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Nueva venta</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
            @include('adminlte-templates::common.errors')
            @include('flash::message')
            <div class="row uniform">
                    {!! Form::open(['route' => 'ventaAccions.store']) !!}

                        @include('venta_accions.fields')

                    {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection


