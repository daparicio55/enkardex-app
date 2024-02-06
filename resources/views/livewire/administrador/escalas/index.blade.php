@extends('adminlte::page')

@section('title', 'Escalas')

@section('content_header')
    <h1>Escalas</h1>
@stop

@section('content')
    @livewire('escalas.index')
@stop