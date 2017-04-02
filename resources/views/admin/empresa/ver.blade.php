@extends('layouts.app')

@section('content')
<div id="wrapper">
    <header id="header">
        <h2>Empresas</h2>
    </header>
    <div id="main">
        <section id="content" class="main">
            @include('flash::message')
            <div class="row uniform">
                    @include('admin.empresa.table')
            </div>
        </section>
    </div>
</div>
@endsection