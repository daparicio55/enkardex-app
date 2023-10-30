@extends('adminlte::page')

@section('title', 'kardex')

@section('content_header')
    <div class="row mb-1">
        <div class="col-sm-12 col-md-6">
            <h1><b>INDICACIONES</b></h1>
        </div>
        <div class="col-sm-12 col-md-6 text-right bg-secondary">
            <h5 class="pt-2 pr-2"><b>#{{ ceros($kardex->numero) }} - {{ Str::upper($kardex->paciente->apellidos) }}, {{ Str::title($kardex->paciente->nombres) }}</b></h5>
        </div>
    </div>
    <a href="{{ route('licenciados.kardexes.index') }}" class="btn btn-warning">
        <i class="fas fa-arrow-circle-left"></i> Regresar
    </a>
    {!! Form::open([
        'route' => 'licenciados.kardexes.indicaciones.create',
        'method' => 'get',
        'role' => 'search',
        'class' => 'd-inline',
    ]) !!}
    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-plus-circle"></i> Nuevo Medicamento
    </button>
    {!! Form::close() !!}
    <x-Modal id="addday" title="Agregar un dia de atencion" type="primary" icon="fas fa-calendar-day"
        route="licenciados.kardexes.dias.store" parameter=null method='POST'>
        <x-slot:body>
            <div class="row">
                <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                <div class="col-sm-12 col-md-6">
                    {!! Form::label('fecha', 'Fecha', [null]) !!}
                    {!! Form::date('fecha', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-12 col-md-6">
                    {!! Form::label('hora', 'Hora', [null]) !!}
                    {!! Form::time('hora', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </x-slot:body>
        <x-slot:textbutton>
            Agregar día
        </x-slot:textbutton>
    </x-Modal>
    @php
        $config = [
            'placeholder' => 'Seleccione multiples medicamentos...',
        ];
    @endphp
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @foreach ($kardex->indicaciones as $key => $indicacione)
                <x-adminlte-card
                    title="{{ $indicacione->medicamento->denominacion }} - {{ $indicacione->medicamento->especificaciones }}"
                    theme="info" icon="fas fa-lg fa-pills" collapsible>
                    {{-- BOTON ELIMINAR --}}
                    <x-slot name="toolsSlot">
                        <x-Modal :id="'delete-' . $indicacione->id" title="Confirmar Accion" type="danger" icon="fas fa-trash-alt"
                            route="licenciados.kardexes.indicaciones.destroy" :parameter="$indicacione->id" method='DELETE'>
                            <x-slot:body>
                                <p class="text-danger mb-0">¿Esta seguro que desea eliminar esta indicación del sistema?</p>
                            </x-slot:body>
                        </x-Modal>
                    </x-slot>
                    {{-- FIN BOTON ELIMINAR --}}
                    {!! Form::model($indicacione, [
                        'route' => ['licenciados.kardexes.indicaciones.update', $indicacione->id],
                        'method' => 'PUT',
                    ]) !!}
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <x-via />
                        </div>
                        <div class="col-sm-6 col-md-4">
                            {!! Form::label('dosis', 'Dosis', [null]) !!}
                            {!! Form::text('dosis', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <x-frecuencia />
                        </div>

                        <div class="col-sm-6 col-md-1">
                            {!! Form::label(null, 'Guardar', ['class' => 'd-block']) !!}
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>
                            </button>
                        </div>
                    </div>
                    <x-slot name="footerSlot">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless">
                                <tbody>
                                    @php
                                        $hora = null;
                                    @endphp
                                    @foreach ($kardex->dias as $dia)
                                        <tr>
                                            <td style="width: 110px" class="text-center p-0 m-0 h5"><b>{{ date('d-m-Y', strtotime($dia->fecha)) }}</b></td>
                                            @if ($loop->first)
                                                @php
                                                    $horainicio = Carbon\Carbon::parse($dia->fecha . ' ' . $kardex->hingreso);
                                                    $horasuma = Carbon\Carbon::parse($dia->fecha . ' ' . $kardex->hingreso);
                                                @endphp
                                                @while ($horasuma->isSameDay($horainicio))
                                                    <td class="text-center text-{{ horacolor($horasuma)->color }} p-0">
                                                        <x-Modal :id="'noaplica-'.$indicacione->id.'-'.$dia->id.'-'.str_replace(':','',horacolor($horasuma)->hora)" title="Confirmar acción" type="secondary" 
                                                            icon="fas fa-ban" route="licenciados.kardexes.dins.store" :parameter="$kardex->id" method=null>
                                                            <x-slot:body>
                                                                <input type="hidden" name="dia_id" value="{{ $dia->id }}">
                                                                <input type="hidden" name="indicacione_id" value="{{ $indicacione->id }}">
                                                                <input type="hidden" name="hora" value="{{ horacolor($horasuma)->hora }}">
                                                                <input type="hidden" name="tipo" value="no aplica">
                                                                <p class="text-left text-dark">Esto marcara como <span><b>NO APLICA</b></span>, ¿Desea continuar?...</p>
                                                            </x-slot>
                                                        </x-Modal>
                                                        <x-Modal :id="'done-'.$indicacione->id.'-'.$dia->id.'-'.str_replace(':','',horacolor($horasuma)->hora)" title="Confirmar acción" type="info" 
                                                            icon="far fa-check-circle" route="licenciados.kardexes.dins.store" :parameter="$kardex->id" method=null>
                                                            <x-slot:body>
                                                                <input type="hidden" name="dia_id" value="{{ $dia->id }}">
                                                                <input type="hidden" name="indicacione_id" value="{{ $indicacione->id }}">
                                                                <input type="hidden" name="hora" value="{{ horacolor($horasuma)->hora }}">
                                                                <input type="hidden" name="tipo" value="aplicado">
                                                                <p class="text-left text-dark">Esto marcara <b>SUMINISTRADA</b>, ¿Desea continuar?...</p>
                                                            </x-slot>
                                                        </x-Modal>
                                                        {{-- ponemos formato para el texto --}}
                                                        <p>
                                                            {{ horacolor($horasuma)->hora }}
                                                            @if (estadohora($dia->id,$indicacione->id,horacolor($horasuma)->hora) == 'no aplica')
                                                                <small class="text-secondary"><i class="fas fa-ban"></i></small>
                                                            @endif
                                                            @if (estadohora($dia->id,$indicacione->id,horacolor($horasuma)->hora) == 'aplicado')
                                                                <small class="text-info"><i class="far fa-check-circle"></i></small>
                                                            @endif
                                                            {{-- @if (estadohora($dia->id,$indicacione->id,horacolor($horasuma)->hora) == null)
                                                                {{ horacolor($horasuma)->hora }}
                                                            @endif --}}
                                                        </p>
                                                        
                                                    </td>
                                                    @php
                                                        $horasuma->addHours($indicacione->frecuencia);
                                                        $hora = $horasuma;
                                                    @endphp
                                                @endwhile
                                            @else
                                                @php
                                                    $horasuma = $hora->copy();
                                                @endphp
                                                @while ($horasuma->isSameDay($hora))

                                                    <td class="text-center text-{{ horacolor($horasuma)->color }} p-0">
                                                        <x-Modal :id="'noaplica-'.$indicacione->id.'-'.$dia->id.'-'.str_replace(':','',horacolor($horasuma)->hora)" title="Confirmar acción" type="secondary" 
                                                            icon="fas fa-ban" route="licenciados.kardexes.dins.store" :parameter="$kardex->id" method=null>
                                                            <x-slot:body>
                                                                <input type="hidden" name="dia_id" value="{{ $dia->id }}">
                                                                <input type="hidden" name="indicacione_id" value="{{ $indicacione->id }}">
                                                                <input type="hidden" name="hora" value="{{ horacolor($horasuma)->hora }}">
                                                                <input type="hidden" name="tipo" value="no aplica">
                                                                <p class="text-left text-dark">Esto marcara como <span><b>NO APLICA</b></span>, ¿Desea continuar?...</p>
                                                            </x-slot>
                                                        </x-Modal>
                                                        <x-Modal :id="'done-'.$indicacione->id.'-'.$dia->id.'-'.str_replace(':','',horacolor($horasuma)->hora)" title="Confirmar acción" type="info" 
                                                            icon="far fa-check-circle" route="licenciados.kardexes.dins.store" :parameter="$kardex->id" method=null>
                                                            <x-slot:body>
                                                                <input type="hidden" name="dia_id" value="{{ $dia->id }}">
                                                                <input type="hidden" name="indicacione_id" value="{{ $indicacione->id }}">
                                                                <input type="hidden" name="hora" value="{{ horacolor($horasuma)->hora }}">
                                                                <input type="hidden" name="tipo" value="aplicado">
                                                                <p class="text-left text-dark">Esto marcara <b>SUMINISTRADA</b>, ¿Desea continuar?...</p>
                                                            </x-slot>
                                                        </x-Modal>
                                                        <p class="mb-0">
                                                            {{ horacolor($horasuma)->hora }}
                                                            @if (estadohora($dia->id,$indicacione->id,horacolor($horasuma)->hora) == 'no aplica')
                                                                <small class="text-secondary"><i class="fas fa-ban"></i></small>
                                                            @endif
                                                            @if (estadohora($dia->id,$indicacione->id,horacolor($horasuma)->hora) == 'aplicado')
                                                                <small class="text-info"><i class="far fa-check-circle"></i></small>
                                                            @endif
                                                            {{-- @if (estadohora($dia->id,$indicacione->id,horacolor($horasuma)->hora) == null)
                                                                {{ horacolor($horasuma)->hora }}
                                                            @endif --}}
                                                        </p>
                                                    </td>
                                                    @php
                                                        $horasuma->addHours($indicacione->frecuencia);
                                                    @endphp
                                                @endwhile
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                    {!! Form::close() !!}
                </x-adminlte-card>
            @endforeach
        </div>
    </div>
@stop
