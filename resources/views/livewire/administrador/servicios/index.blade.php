@extends('adminlte::page')

@section('title', 'Unidades')

@section('content_header')
    <h1>Servicios</h1>
@stop

@section('content')
   @livewire('servicios.index')
@stop