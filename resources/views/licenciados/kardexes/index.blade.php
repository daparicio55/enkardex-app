@extends('adminlte::page')

@section('title', 'kardex')

@section('content_header')
    <h1>Hojas de tratamiento terapeutico (KARDEX)</h1>
{{--     <a href="{{ route('licenciados.kardexes.create') }}" class="btn btn-success mt-1">
        <i class="fas fa-plus-circle"></i> Nuevo
    </a> --}}
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">
        @foreach ($kardexes as $kardex)
            <div class="card">
                <div class="card-header bg-info">
                    <x-Modal :id="'delete-' . $kardex->id" title="Confirmar Accion" type="danger"
                        icon="fas fa-trash-alt" route="licenciados.kardexes.destroy" :parameter="$kardex->id"
                        method='delete'>
                        <x-slot:body>
                            <p class="text-secondary">¿Esta seguro que desea eliminar este Kardex? Recuerde que tambien eliminara
                                todos los detalles relacionados a esta</p>
                        </x-slot>
                    </x-Modal>
                    <a class="btn btn-warning mt-1" href="{{ route('kardex.editar',$kardex->id) }}">
                        <i class="fas fa-user-edit"></i>
                    </a>
                    #{{ ceros($kardex->numero) }}  {{ Str::upper($kardex->paciente->apellidoPaterno) }} 
                    {{ Str::upper($kardex->paciente->apellidoMaterno) }}, {{ Str::title($kardex->paciente->nombres) }}
                    
                </div>
                <div class="card-header">
                    <h5 class=" border border-top-0 border-left-0 border-right-0 d-block pb-1">
                        {{ $kardex->servicio->nombre }}
                    </h5>
                    <p class="card-text">
                        {{ $kardex->diagnostico }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
    {{-- <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-info">
                            <th class="pb-1 pt-1" style="width: 50px">N°</th>
                            <th class="pb-1 pt-1">PACIENTE</th>
                            <th class="pb-1 pt-1">SERVICIO</th>
                            <th class="pb-1 pt-1 text-center" style="width: 50px">AMB.</th>
                            <th class="pb-1 pt-1 text-center" style="width: 100px">FECHA</th>
                            <th class="pb-1 pt-1 text-center" style="width: 100px">HORA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kardexes as $kardex)
                            <tr>
                                <td class="pb-0">{{ ceros($kardex->numero) }}</td>
                                <td class="pb-0">{{ Str::upper($kardex->paciente->apellidoPaterno) }}
                                    {{ Str::upper($kardex->paciente->apellidoMaterno) }},
                                    {{ Str::title($kardex->paciente->nombres) }}</td>
                                <td class="pb-0">{{ $kardex->servicio->nombre }}</td>
                                <td class="pb-0 text-center">{{ $kardex->ambiente->nombre }}</td>
                                <td class="pb-0 text-center">{{ date('d-m-Y', strtotime($kardex->fingreso)) }}</td>
                                <td class="pb-0 text-center">{{ date('H:i:s', strtotime($kardex->hingreso)) }}</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    {!! Form::open(['route' => 'licenciados.kardexes.indicaciones.index', 'method' => 'get', 'class' => 'd-inline']) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-pills"></i>
                                    </button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => 'licenciados.kardexes.eauxiliares.index', 'method' => 'get', 'class' => 'd-inline']) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-vials"></i>
                                    </button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['route' => 'licenciados.kardexes.dietas.index', 'method' => 'get', 'class' => 'd-inline']) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-utensils"></i>
                                    </button>
                                    {!! Form::close() !!}
                                    {!! Form::open([
                                        'route' => 'licenciados.kardexes.procedimientos.index',
                                        'method' => 'get',
                                        'class' => 'd-inline',
                                    ]) !!}
                                    <input type="hidden" name="kardex" value="{{ $kardex->id }}">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fas fa-procedures"></i>
                                    </button>
                                    {!! Form::close() !!}
                                    <x-Modaladdday :id="$kardex->id" ubicacion="kardexes" />
                                    <a href="{{ route('licenciados.kardexes.show',$kardex->id) }}" class="btn btn-outline-warning" title="imprimir hoja de tratamiento terapeutico">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <x-Modal :id="'delete-' . $kardex->id" title="Confirmar Accion" type="danger"
                                        icon="fas fa-trash-alt" route="licenciados.kardexes.destroy" :parameter="$kardex->id"
                                        method=null>
                                        <x-slot:body>
                                            <p>¿Esta seguro que desea eliminar este Kardex? Recuerde que tambien eliminara
                                                todos los detalles relacionados a esta</p>
                                        </x-slot>
                                    </x-Modal>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
@stop


@section('footer')
<div class="container d-flex justify-content-around">
    <a href="{{ route('index') }}" class="btn btn-info btn-lg">
        <i class="fas fa-home fa-lg"></i> Inicio
    </a>
</div>
@stop

@push('js')
    <x-Alert />
@endpush
