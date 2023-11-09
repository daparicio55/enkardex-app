@extends('adminlte::page')
@section('title', 'Procedimientos')
@section('content_header')

    <div class="row mb-1">
        <div class="col-sm-12 col-md-6">
            <h1><b>Procedimientos</b></h1>
        </div>
        <div class="col-sm-12 col-md-6 text-right bg-secondary">
            <h5 class="pt-2 pr-2"><b>#{{ ceros($kardex->numero) }} - {{ Str::upper($kardex->paciente->apellidoPaterno) }} {{ Str::upper($kardex->paciente->apellidoMaterno) }},
                    {{ Str::title($kardex->paciente->nombres) }}</b></h5>
        </div>
    </div>
    <a href="{{ route('licenciados.kardexes.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-circle-left"></i> Regresar
    </a>
    {!! Form::open([
        'route' => 'licenciados.kardexes.procedimientos.create',
        'method' => 'get',
        'role' => 'search',
        'class' => 'd-inline',
    ]) !!}
    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-plus-circle"></i>
    </button>
    {!! Form::close() !!}
    <x-Modaladdday :id="$kardex->id" ubicacion="procedimientos" />
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach ($kardex->dias as $dia)
                <x-adminlte-card title="{{ date('d-m-Y', strtotime($dia->fecha)) }}" theme="info"
                    icon="fas fa-calendar-alt" collapsible>
                    {{-- BOTON ELIMINAR --}}
                    <x-slot name="toolsSlot">
                        {{-- agregar boton para agregar comida --}}
                        <x-Modal :id="'addfoot-' . $dia->id" title="Agregar nueva procedimiento" type="warning"
                            icon="fas fa-procedures" route="licenciados.kardexes.dprocedimientos.store" method="POST"
                            parameter=null>
                            <x-slot:body>
                                <input type="hidden" name="dia" value="{{ $dia->id }}">
                                <x-adminlte-select2 id="procedimientos-{{ $dia->id }}" name="procedimientos[]"
                                    label="Seleccione los procedimientos para este día" label-class="text-dark"
                                    igroup-size="md" placeholder-class="text-dark"
                                    data-placeholder="Seleccione multiples procedimientos..." multiple>
                                    @foreach ($procedimientos as $procedimiento)
                                        <option value="{{ $procedimiento->id }}">{{ $procedimiento->nombre }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                                <x-inputtime name="hora" id="hora" label="Hora" class="text-danger">
                                    <x-slot name="pre">
                                        <span class="input-group-text bg-gradient-info">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </x-slot>
                                    </x-inputdate>
                            </x-slot:body>
                        </x-Modal>
                    </x-slot>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                                @php
                                    $dprocedimientos = \App\Models\DiaProcedimiento::where('dia_id', '=', $dia->id)->get();
                                @endphp
                                @foreach ($dprocedimientos as $dprocedimiento)
                                    <tr>
                                        <td class="pb-0 pt-0">{{ $dprocedimiento->procedimiento->nombre }}</td>
                                        <td class="pb-0 pt-0 text-{{ horacolor($dprocedimiento->hora)->color }}">
                                            {{ horacolor($dprocedimiento->hora)->hora }} 
                                            @if(isset($dprocedimiento->registro))
                                                <i class="far fa-check-circle text-info"></i>
                                            @else
                                                <i class="fas fa-hourglass-half"></i>
                                            @endif
                                        </td>
                                        <td class="pb-0 pt-1" style="width: 150px">
                                            <x-Modal :id="'done-'.$dprocedimiento->id.'-'.$dia->id.'-'.str_replace(':', '', $dprocedimiento->hora)" 
                                                title="Confirmar acción" type="info" icon="far fa-check-circle" route="licenciados.kardexes.dprocedimientos.update" 
                                                :parameter="$dprocedimiento->id" method="PUT">
                                                <x-slot:body>
                                                    <p class="text-left text-dark">Esto marcara el procedimiento como
                                                        <b>REALIZADO</b>, ¿Desea continuar?...</p>
                                                </x-slot:body>
                                            </x-Modal>
                                            <x-Modal :id="'delete-' . $dia->id . '-' . $dprocedimiento->id" title="Confirmar Accion" type="danger"
                                                icon="fas fa-trash-alt" route="licenciados.kardexes.dprocedimientos.destroy"
                                                :parameter="$dprocedimiento->id" method='DELETE'>
                                                <x-slot:body>
                                                    <p class="text-danger mb-0">¿Esta seguro que desea eliminar esta dieta?
                                                    </p>
                                                </x-slot:body>
                                            </x-Modal>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </x-adminlte-card>
            @endforeach
        </div>
    </div>
@stop
@push('js')
    <x-Alert />
@endpush
