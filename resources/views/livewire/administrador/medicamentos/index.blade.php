@extends('adminlte::page')

@section('title', 'Medicamentos')

@section('content_header')
    <h1>Medicamentos</h1>
@stop

@section('content')
   @livewire('medicamentos.index')
@stop