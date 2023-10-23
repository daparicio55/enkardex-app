@extends('adminlte::page')

@section('title', 'kardex')

@section('content_header')
    <h1>Registrar Indicaciones</h1>
    <p>#{{ $kardex->numero }} - {{ Str::upper($kardex->paciente->apellidos) }},{{ Str::title($kardex->paciente->nombres) }}</p>
    {!! Form::open(['route'=>'licenciados.kardexes.indicaciones.index','method'=>'get']) !!}
        <input type="hidden" name="kardex" value="{{ $kardex->id }}">
        <button type="submit" class="btn btn-warning mt-1">
            <i class="fas fa-arrow-circle-left"></i> Regresar
        </button>
    {!! Form::close() !!}
@php
    $config = [
        "placeholder" => "Seleccione multiples medicamentos...",
    ];
@endphp
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        {!! Form::open(['route'=>'licenciados.kardexes.indicaciones.store','method'=>'post']) !!}
        <input type="hidden" name="kardex" value="{{ $kardex->id }}">
        <x-adminlte-card title="Medicamentos" theme="info" icon="fas fa-pills" collapsible>
            <div class="row">
                <div class="col-sm-12">
                    <x-adminlte-select2 id="medicamentos" name="medicamentos[]" label="Seleccione un medicamento" igroup-size="md" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </x-slot>
                        @foreach ($medicamentos as $medicamento)
                            <option value="{{ $medicamento->id }}">{{ $medicamento->denominacion }} - {{ $medicamento->especificaciones }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>
            <x-slot name="footerSlot">
                {{-- <x-adminlte-button class="d-flex ml-auto" theme="light" label="Guardar" icon="fas fa-sign-in"/> --}}
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </x-slot>
        </x-adminlte-card>
        {!! Form::close() !!}
    </div>
</div>
@stop