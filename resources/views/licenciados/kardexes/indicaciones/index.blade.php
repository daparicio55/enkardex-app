@extends('adminlte::page')

@section('title', 'kardex')

@section('content_header')
    <h1>Indicaciones</h1>
    <p>#{{ $kardex->numero }} - {{ Str::upper($kardex->paciente->apellidos) }},{{ Str::title($kardex->paciente->nombres) }}</p>
    <a href="{{ route('licenciados.kardexes.index') }}" class="btn btn-warning mt-1">
        <i class="fas fa-arrow-circle-left"></i> Regresar
    </a>
    {!! Form::open(['route'=>'licenciados.kardexes.indicaciones.create','method'=>'get','role'=>'search','class'=>'d-inline']) !!}
        <input type="hidden" name="kardex" value="{{ $kardex->id }}">
        <button type="submit" class="btn btn-success mt-1">
            <i class="fas fa-plus-circle"></i> Nuevo
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
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Indicaciones / Medicamento</th>
                        <th style="width: 130px">Dosis</th>
                        <th style="width: 120px">Via</th>
                        <th>Frecuencia</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kardex->indicaciones as $key=>$indicacione)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $indicacione->medicamento->denominacion }} - {{ $indicacione->medicamento->especificaciones }}</td>
                            {!! Form::model($indicacione, ['route'=>['licenciados.kardexes.indicaciones.update',$indicacione->id],'method'=>'PUT']) !!}
                                <td>
                                    {!! Form::text('dosis', null, ['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    <x-via />
                                </td>
                                <td>
                                    <x-frecuencia />
                                </td>
                                <td class="pl-1 pr-0">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i>
                                    </button>
                                </td>
                            {!! Form::close() !!}
                            <td class="pl-1 pr-0">
                                <x-Modal :id="'delete-'.$indicacione->id" title="Confirmar Accion" type="danger" 
                                    icon="fas fa-trash-alt" route="licenciados.kardexes.indicaciones.destroy" :parameter="$indicacione->id">
                                    <x-slot:body>
                                        <p>¿Esta seguro que desea eliminar esta indicacion del sistema?</p>
                                    </x-slot:body>
                                </x-Modal>
                            </td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop