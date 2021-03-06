@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Inicio</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
            @include('flash::message')
            <div class="row uniform">
            <ul class="actions fit">
            <li><button type="button" id="registro_venta" class="btn-lg button special fit button">Registrar venta</button></li>
            <li><button type="button" id="ventas_dia" class="btn-lg button default fit">Ventas del día</button></li> 
            </ul>
            </div>
        </section>
        @include('venta_empresas')
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#registro_venta').click(function(){
            window.location.href = "{!! route('nuevaVenta') !!}";
        });
        $('#ventas_dia').click(function(){
             window.location.href = "{!! route('venta.dia') !!}";
        });
    });
</script>
@endsection
