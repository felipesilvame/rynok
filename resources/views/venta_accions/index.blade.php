@extends('layouts.app')

@section('content')
 <div id="wrapper">
    <header id="header">
        <h2>Venta Acciones</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
        <h1 class="pull-right">
           <a class="btn-lg button special pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('ventaAccions.create') !!}">Nuevo</a>
        </h1>
        <div class="clearfix"></div>
            <div class="content">
                @include('flash::message')
                <div class="row uniform">
                    @include('venta_accions.table')
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
