@extends('adminlte::page')

@section('title', 'Dietas')

@section('content_header')
    <div class="row mb-1">
        <div class="col-sm-12 col-md-6">
            <h1><b>Dietas recomendadas</b></h1>
        </div>
        <div class="col-sm-12 col-md-6 text-right bg-secondary">
            <h5 class="pt-2 pr-2"><b>#{{ ceros($kardex->numero) }} - {{ Str::upper($kardex->paciente->apellidos) }},
                    {{ Str::title($kardex->paciente->nombres) }}</b></h5>
        </div>
    </div>
    <a href="{{ route('licenciados.kardexes.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-circle-left"></i> Regresar
    </a>
    <x-Modal id="addday" title="Agregar un dia de atencion" type="primary" icon="fas fa-calendar-day"
        route="licenciados.kardexes.dias.store" parameter=null method='POST'>
        <x-slot:body>
            <div class="row">
                <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                <input type="hidden" name="local" value="dietas">
                <div class="col-sm-12 col-md-12">
                    {!! Form::label('fecha', 'Fecha', [null]) !!}
                    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </x-slot:body>
        <x-slot:textbutton>
            Agregar día
        </x-slot:textbutton>
    </x-Modal>
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
                        <x-Modal :id="'addfoot-' . $dia->id" title="Agregar nueva dieta" type="warning" icon="fas fa-hamburger"
                            route="licenciados.kardexes.ddietas.store" method="POST" parameter=null>
                            <x-slot:body>
                                <input type="hidden" name="dia" value="{{ $dia->id }}">
                                <x-adminlte-select2 id="dietas" name="dietas[]"
                                    label="Seleccione las dietas para este día" label-class="text-dark" igroup-size="md"
                                    data-placeholder="Seleccione multiples dietas..." multiple>
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-gradient-warning">
                                            <i class="fas fa-utensils"></i>
                                        </div>
                                    </x-slot>
                                    @foreach ($dietas as $dieta)
                                        <option value="{{ $dieta->id }}">{{ $dieta->nombre }}</option>
                                    @endforeach
                                </x-adminlte-select2>
                            </x-slot:body>
                        </x-Modal>
                    </x-slot>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                                @php
                                    $ddietas = \App\Models\DiaDieta::where('dia_id', '=', $dia->id)->get();
                                @endphp
                                @foreach ($ddietas as $ddieta)
                                    <tr>
                                        <td class="pt-0 pb-1">{{ $ddieta->dieta->nombre }}</td>
                                        <td class="pt-0 pb-1">{{ $ddieta->dieta->descripcion }}</td>
                                        <td class="pb-0" style="width: 80px">
                                            <x-Modal :id="'delete-' . $dia->id.'-'.$ddieta->id" title="Confirmar Accion" type="danger"
                                                icon="fas fa-trash-alt" route="licenciados.kardexes.ddietas.destroy"
                                                :parameter="$ddieta->id" method='DELETE'>
                                                <x-slot:body>
                                                    <p class="text-danger mb-0">¿Esta seguro que desea eliminar esta dieta?</p>
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
