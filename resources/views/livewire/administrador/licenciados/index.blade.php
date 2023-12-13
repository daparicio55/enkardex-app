@extends('adminlte::page')

@section('title', 'Licenciados')

@section('content_header')
    <h1>Licenciados</h1>
@stop

@section('content')
    {{-- @livewire('dietas.index') --}}
    @livewire('licenciados.index')
@stop