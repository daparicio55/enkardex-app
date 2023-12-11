@extends('adminlte::page')

@section('title', 'Unidades')

@section('content_header')
    <h1>Unidades</h1>
@stop

@section('content')
   @livewire('unidades.index')
@stop