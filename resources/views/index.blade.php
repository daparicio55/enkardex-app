@extends('adminlte::page')

@section('title', 'INICIO')

@section('content_header')
    <h1>Panel de Administracion</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop
@section('footer')
    Sistema de Kardex digital...
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop