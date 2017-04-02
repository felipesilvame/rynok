<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="thumbnail" content="{!! url('/images/portada_rynok.jpg') !!}" />
    <meta name="author" content="Felipe Silva"/>
    <meta name="description" content="Rynok es la Bolsa de Valores que administra los activos financieros de las empresas participantes de la XIX Feria de Creación de Empresas. La bolsa fue desarrollada por Wolfies S.A con el fin de máximizar la rentabilidad de las empresas que participan en el mercado bursátil. La rentabilidad de las empresas es nuestra rentabilidad."/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    @include('assets.css')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="">
        @include('layouts.header')

        @yield('content')
        @include('layouts.footer')
    </div>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    @include('assets.js')
</body>
</html>
