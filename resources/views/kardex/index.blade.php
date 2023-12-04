@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        HOJA DE TRATAMIENTO TERAPEUTICO
    </h1>
@stop

@section('content')
    @livewire('kardex-paciente',['id'=>0])
@stop

@section('footer')
<div class="container d-flex justify-content-around">
    <a href="{{ route('index') }}" class="btn btn-info btn-lg">
        <i class="fas fa-home fa-lg"></i> Inicio
    </a>
</div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
 --}}
{{-- @section('js')
    <script> console.log('Hi!'); </script>
@stop --}}