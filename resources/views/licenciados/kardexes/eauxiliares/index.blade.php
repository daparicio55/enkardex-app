@extends('adminlte::page')

@section('title', 'E Auxiliares')

@section('content_header')
    <div class="row mb-1">
        <div class="col-sm-12 col-md-6">
            <h1><b>Exámenes Auxiliares</b></h1>
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
        'route' => 'licenciados.kardexes.eauxiliares.create',
        'method' => 'get',
        'role' => 'search',
        'class' => 'd-inline',
    ]) !!}
    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-plus-circle"></i>
    </button>
    {!! Form::close() !!}
    <x-Modaladdday :id="$kardex->id" ubicacion="eauxiliares" />
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach ($eauxiliares as $eauxiliare)
                <x-adminlte-card
                    title="{{ $eauxiliare->examene->nombre }}"
                    theme="info" icon="fas fa-vials" collapsible="collapsed">
                    {{-- BOTON ELIMINAR --}}
                    <x-slot name="toolsSlot">
                        <x-Modal :id="'delete-' . $eauxiliare->id" title="Confirmar Accion" type="danger" icon="fas fa-trash-alt"
                            route="licenciados.kardexes.eauxiliares.destroy" :parameter="$eauxiliare->id" method='DELETE'>
                            <x-slot:body>
                                <p class="text-danger mb-0">¿Esta seguro que desea eliminar esta exámen del sistema?</p>
                            </x-slot:body>
                        </x-Modal>
                    </x-slot>
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <tbody>
                                @foreach ($kardex->dias as $dia)
                                    <tr>
                                        <td style="width: 150px" class="pt-0">
                                            <x-Modal :id="'solicitar-'.$eauxiliare->id.'-'.$dia->id" type="warning" icon="fas fa-file-medical" title="Confirmar Solicitud"
                                                route="licenciados.kardexes.deas.store" method='POST' parameter=null>
                                                <x-slot:body>
                                                    <input type="hidden" name="eauxiliare" value="{{ $eauxiliare->id }}">
                                                    <input type="hidden" name="dia" value="{{ $dia->id }}">
                                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                                    ¿Desea confirmar la solicitud del exámen?
                                                </x-slot:body>
                                            </x-Modal>
                                            {{ date('d-m-Y',strtotime($dia->fecha)) }}
                                        </td>
                                        @php
                                            $exs = App\Models\DiaEauxiliare::where('eauxiliare_id','=',$eauxiliare->id)
                                            ->where('dia_id','=',$dia->id)
                                            ->get();
                                        @endphp
                                        @foreach ($exs as $ex)
                                            <td class="text-center p-0">
                                                    <x-Modal :id="'eliminar-'.$eauxiliare->id.'-'.$dia->id.'-'.str_replace(':','',$ex->hora)" type="danger" icon="fa fa-trash"
                                                        title="Confirmar Acción" route="licenciados.kardexes.deas.destroy" :parameter="$ex->id" method="DELETE">
                                                        <x-slot:body>
                                                            <p class="text-left">¿Esta seguro que desea eliminar este exámen?</p>
                                                        </x-slot:body>
                                                    </x-Modal>
                                                    <x-Modal :id="'confirmar-'.$eauxiliare->id.'-'.$dia->id.'-'.str_replace(':','',$ex->hora)" type="info" icon="fa fa-check"
                                                        title="Confirmar Acción" route="licenciados.kardexes.deas.update" :parameter="$ex->id" method="PUT">
                                                        <x-slot:body>
                                                            <p class="text-left">¿Desea marcar este examen como realizado o completado</p>
                                                        </x-slot:body>
                                                    </x-Modal>
                                                <p class="m-0 p-0">
                                                    <span class="text-{{ horacolor($ex->hora)->color }}">{{ horacolor($ex->hora)->hora }}</span>
                                                    @if ($ex->estado == "realizado")
                                                        <i class="far fa-check-circle text-info"></i>
                                                    @else
                                                        <i class="fas fa-hourglass-half"></i>
                                                    @endif
                                                </p>
                                            </td>    
                                        @endforeach
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
