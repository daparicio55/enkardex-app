@extends('adminlte::page')

@section('title', 'Dietas')

@section('content_header')
    <h1>Dietas</h1>
@stop

@section('content')
    @livewire('dietas.index')
@stop