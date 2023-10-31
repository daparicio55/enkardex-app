@extends('adminlte::page')

@section('title', 'kardex')

@section('content_header')
    <h1>Hojas de tratamiento terapeutico (KARDEX)</h1>
    <a href="{{ route('licenciados.kardexes.create') }}" class="btn btn-success mt-1">
        <i class="fas fa-plus-circle"></i> Nuevo
    </a>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 50px">N°</th>
                        <th>Paciente</th>
                        <th style="width: 50px">Amb.</th>
                        <th style="width: 100px">F. Ingreso</th>
                        <th style="width: 120px">H. Ingreso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kardexes as $kardex)
                        <tr>
                            <td>{{ $kardex->numero }}</td>
                            <td>{{ Str::upper($kardex->paciente->apellidos) }}, {{ Str::title($kardex->paciente->nombres) }}</td>
                            <td>{{ $kardex->ambiente->nombre }}</td>
                            <td>{{ date('d-m-Y',strtotime($kardex->fingreso)) }}</td>
                            <td>{{ date('h:i:s A',strtotime($kardex->hingreso)) }}</td>
                            <td style="width: 230px">
                                {!! Form::open(['route'=>'licenciados.kardexes.indicaciones.index','method'=>'get','class'=>'d-inline']) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-pills"></i> 
                                    </button>
                                {!! Form::close() !!}
                                {{-- examens auxiales--}}
                                {!! Form::open(['route'=>'licenciados.kardexes.eauxiliares.index','method'=>'get','class'=>'d-inline']) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-vials"></i>
                                    </button>
                                {!! Form::close() !!}
                                {!! Form::open(['route'=>'licenciados.kardexes.dietas.index','method'=>'get','class'=>'d-inline']) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-utensils"></i>
                                    </button>
                                {!! Form::close() !!}
                                <x-Modal :id="'delete-'.$kardex->id" title="Confirmar Accion" type="danger" 
                                    icon="fas fa-trash-alt" route="licenciados.kardexes.destroy" :parameter="$kardex->id" method=null>
                                    <x-slot:body>
                                        <p>¿Esta seguro que desea eliminar este Kardex? Recuerde que tambien eliminara todos los detalles relacionados a esta</p>
                                    </x-slot>
                                </x-Modal>
                                {{-- <i class="fas fa-vials"></i> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
