@extends('adminlte::page')

@section('title', 'Exámenes')

@section('content_header')
    <h1>Registrar Exámenes Auxiliares</h1>
    <p>#{{ $kardex->numero }} - {{ Str::upper($kardex->paciente->apellidos) }},{{ Str::title($kardex->paciente->nombres) }}
    </p>
    {!! Form::open(['route' => 'licenciados.kardexes.eauxiliares.index', 'method' => 'get']) !!}
    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
    <button type="submit" class="btn btn-warning mt-1">
        <i class="fas fa-arrow-circle-left"></i> Regresar
    </button>
    {!! Form::close() !!}
@stop
@section('content')
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open(['route' => 'licenciados.kardexes.eauxiliares.store', 'method' => 'post']) !!}
            <input type="hidden" name="kardex" value="{{ $kardex->id }}">
            <x-adminlte-card title="Exámenes" theme="info" icon="fas fa-vials" collapsible>
                <div class="row">
                    <div class="col-sm-12">
                        <x-adminlte-select2 id="examenes" name="examenes[]" label="Seleccione un Exámen Auxiliar"
                            igroup-size="md"  data-placeholder="Seleccione multiples examenes..." multiple>
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                            </x-slot>
                            @foreach ($examenes as $examene)
                                <option value="{{ $examene->id }}">{{ $examene->nombre }}</option>
                            @endforeach
                        </x-adminlte-select2>
                        <x-adminlte-select2 id="doctore" name="doctore" label="Seleccione un Médico"
                            igroup-size="md" data-placeholder="Seleccione un médico...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                            </x-slot>
                            @foreach ($doctores as $doctore)
                                <option value="{{ $doctore->id }}">{{ $doctore->apellidos }}, {{ $doctore->nombres }}</option>
                            @endforeach
                        </x-adminlte-select2>
                        <x-adminlte-textarea name="descripcion" label="Descripcion del motivo de exámen" rows=5 label-class="text-dark"
                            igroup-size="sm" placeholder="ingrese texto...">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-info">
                                    <i class="fas fa-lg fa-file-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-textarea>
                    </div>
                </div>
                <x-slot name="footerSlot">
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </x-slot>
            </x-adminlte-card>
            {!! Form::close() !!}
        </div>
    </div>
@stop
