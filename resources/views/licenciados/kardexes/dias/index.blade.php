@extends('adminlte::page')
@section('title', 'Días')
@section('content_header')
    <div class="row mb-1">
        <div class="col-sm-12 col-md-6">
            <h1><b>Días</b></h1>
        </div>
        <div class="col-sm-12 col-md-6 text-right bg-secondary">
            <h5 class="pt-2 pr-2"><b>#{{ ceros($kardex->numero) }} - {{ Str::upper($kardex->paciente->apellidoPaterno) }}
                    {{ Str::upper($kardex->paciente->apellidoMaterno) }},
                    {{ Str::title($kardex->paciente->nombres) }}</b></h5>
        </div>
    </div>
    <a href="{{ route('licenciados.kardexes.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-circle-left"></i>
    </a>
    {!! Form::open([
        'route' => 'licenciados.kardexes.indicaciones.create',
        'method' => 'get',
        'role' => 'search',
        'class' => 'd-inline',
    ]) !!}
    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-plus-circle"></i>
    </button>
    {!! Form::close() !!}

    <x-Modal id="addday" title="Agregar un dia de atencion" type="primary" icon="fas fa-calendar-day"
        route="licenciados.kardexes.dias.store" parameter=null method='POST'>
        <x-slot:body>
            <div class="row">
                <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                <input type="hidden" name="local" value="indicaciones">
                <div class="col-sm-12 col-md-6">
                    {!! Form::label('dias', 'Dias creados', [null]) !!}
                    <ol>
                        @foreach ($kardex->dias as $dia)
                            <li>{{ date('d-m-Y', strtotime($dia->fecha)) }}</li>
                        @endforeach
                    </ol>
                </div>
                <div class="col-sm-12 col-md-6">
                    {!! Form::label('add', 'Agregar días', [null]) !!}
                    <select name="add" id="add" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        </x-slot:body>
        <x-slot:textbutton>
        </x-slot:textbutton>
    </x-Modal>
@stop
@section('content')
    
@stop
@push('js')
    <x-Alert />
@endpush
