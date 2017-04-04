@extends('layouts.app')

@section('content')
 <div id="wrapper">
    <header id="header">
        <h2>Ver Transacción</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
        <div class="clearfix"></div>
            <div class="content">
                @include('flash::message')
                <div class="row uniform">
                    @include('venta_accions.show_fields')
                </div>
                <div class="row uniform">
                    <a href="{!! route('nuevaVenta') !!}" class=" button special hidden-print">Nueva venta</a>
                    <a href="{!! url('/') !!}" class="btn btn-default btn-lg hidden-print">Volver</a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

