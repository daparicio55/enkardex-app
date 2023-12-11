@extends('adminlte::page')

@section('title', 'Doctores')

@section('content_header')
    <h1>Doctores</h1>
@stop

@section('content')
   @livewire('doctores.index')
@stop