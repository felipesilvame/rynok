@extends('layouts.app')

@section('content')
 <div id="wrapper">
    <header id="header">
        <h2>Ventas del Dia</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
        <div class="clearfix"></div>
            <div class="content">
                @include('flash::message')
                <div class="row uniform form">
                    <div class="col-md-4 pull-right form-group form-inline">
                    <div class="input-group">
                        {{ Form::label('fecha', 'Filtrar por fecha:', ['class' => 'control-label'])}}
                        <input type="date" id="cambio_fecha" name="fecha" value="{!! $fecha->toDateString() !!}" class="control-label">
                    </div>

                    </div>
                </div>
                <div class="row uniform">
                    @include('ventaDia.table')
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#cambio_fecha').change(function(){
            window.location.href = "{!! route('venta.dia') !!}?fecha="+$(this).val();
        })
    });
</script>
@endsection
