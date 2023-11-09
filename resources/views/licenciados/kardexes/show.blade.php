<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <title>{{ ceros($kardex->numero) }}-{{ $kardex->paciente->numeroDocumento }}</title>
    {{-- <style>
        @media print{@page {size: landscape}}
    </style> --}}
</head>

<body>
    <div>
        <div class="row border-bottom border-primary">
            <div class="col-sm-4 d-flex justify-content-center">
                <img class="pb-2" style="width: 220px" src="{{ asset('assets/img/logo.png') }}" alt="">
            </div>
            <div class="col-sm-8 d-flex justify-content-center align-items-center">
                <div>
                    <h4 class="text-primary"><b>HOJA DE TRATAMIENTO TERAPEUTICO - {{ ceros($kardex->numero) }}</b></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mt-2">
                <p class="mb-1 border rounded border-primary"><b class="pl-1">APELLIDOS y NOMBRES:</b>
                    {{ Str::upper($kardex->paciente->apellidoPaterno) }}
                    {{ Str::upper($kardex->paciente->apellidoMaterno) }}, {{ Str::upper($kardex->paciente->nombres) }}
                    <b>FECHA INGRESO: </b>{{ date('d-m-Y', strtotime($kardex->fingreso)) }} <b>HORA INGRESO:
                    </b>{{ $kardex->hingreso }}
                </p>
                <p class="mb-1 pl-1 border rounded border-primary"><b>MÉDICO TRATANTE: </b>
                    {{ Str::upper($kardex->doctore->apellidos) }},
                    {{ Str::title($kardex->doctore->nombres) }}<b class="pl-1"> DIAGNÓSTICO:
                    </b>{{ $kardex->diagnostico }}</p>
                <p class="border rounded border-primary"><b class="pl-1">ALERGIAS: </b>
                    @foreach ($kardex->paciente->alergias as $alergia)
                        @if ($loop->first)
                            {{ $alergia->medicamento->denominacion }},
                        @else
                            @if ($loop->last)
                                {{ $alergia->medicamento->denominacion }}.
                            @else
                                {{ $alergia->medicamento->denominacion }},
                            @endif
                        @endif
                    @endforeach
                </p>
            </div>
        </div>
        {{-- INDICACIONES MEDICAMENTOS --}}
        <div class="row">
            <div class="col-sm-12 border-bottom border-top bg-secondary rounded text-center">
                <h6 class="pt-1 pl-1"><b>DETALLES</b></h6>
            </div>
            <div class="col-sm-12">
                <table class="table border">
                    <thead>
                        <tr>
                            <th class="m-0 p-0 bg-secondary">MEDICAMENTOS</th>
                            @foreach ($kardex->dias as $dia)
                                <th class="m-0 p-0 text-center border">{{ date('d-m-Y', strtotime($dia->fecha)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.8rem">
                        @foreach ($kardex->indicaciones as $indicacione)
                            <tr>
                                <td class="m-0 p-0 border">
                                    {{ $indicacione->medicamento->denominacion }}-{{ $indicacione->dosis }}/
                                    {{ $indicacione->via->nombre }}-{{ $indicacione->frecuencia }}h.</td>
                                    @foreach ($kardex->dias as $diaa)
                                    @php
                                        $dindicaciones = \App\Models\DiaIndicacione::where('dia_id',$diaa->id)
                                        ->where('indicacione_id',$indicacione->id)
                                        ->orderBy('hora','asc')
                                        ->get();
                                    @endphp
                                    <td class="m-0 p-0 border">    
                                        <div class="d-flex">
                                            @foreach ($dindicaciones as $detalle)
                                            <div>
                                                <p class="m-1 p-0 border rounded text-{{ horacolor($detalle->hora)->color }}">
                                                    {{ date('H:i',strtotime($detalle->hora)) }} 
                                                    @if ($detalle->tipo == "aplicado")
                                                        <i class="far fa-check-circle"></i>
                                                    @else
                                                        <i class="fas fa-ban"></i>
                                                    @endif
                                                </p>
                                                <p class="m-1 p-0 border rounded">
                                                    {{ date('H:i',strtotime($detalle->registro)) }}
                                                    {{ $detalle->user->lastname}}
                                                </p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- DIETAS --}}
                    <thead>
                        <tr>
                            <th class="m-0 p-0 bg-secondary">DIETAS</th>
                            @foreach ($kardex->dias as $dia)
                                <th class="m-0 p-0 text-center border">{{ date('d-m-Y', strtotime($dia->fecha)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.8rem">
                        <tr>
                            <td class="m-0 p-0 border"></td>
                            @foreach ($kardex->dias as $dia)
                                <td class="m-0 p-0 border text-center">
                                    @foreach ($dia->ddietas as $ddieta)
                                        @if ($loop->first)
                                            {{ $ddieta->dieta->nombre }}    
                                        @else
                                            @if ($loop->last)
                                                , {{ $ddieta->dieta->nombre }}.
                                            @else
                                                , {{ $ddieta->dieta->nombre }}
                                            @endif
                                        @endif
                                        
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                    {{-- EXAMENES AUXILIARES --}}
                    <thead>
                        <tr>
                            <th class="m-0 p-0 bg-secondary">EXÁMENES AUXILIARES</th>
                            @foreach ($kardex->dias as $dia)
                                <th class="m-0 p-0 text-center border">{{ date('d-m-Y', strtotime($dia->fecha)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.8rem">
                            @foreach ($kardex->eauxiliares as $eauxiliare)
                            <tr>
                                <td class="m-0 p-0 border">{{ $eauxiliare->examene->nombre }}</td>
                                @foreach ($kardex->dias as $dia)
                                    @php
                                        $dayeauxiliares = \App\Models\DiaEauxiliare::where('dia_id',$dia->id)
                                        ->where('eauxiliare_id',$eauxiliare->id)
                                        ->get();
                                    @endphp
                                    <td class="m-0 p-0 border">
                                        <div class="d-flex">
                                            @foreach ($dayeauxiliares as $dayeauxiliare)
                                            <div>
                                                <p class="m-1 p-0  border rounded text-{{ horacolor($dayeauxiliare->hora)->color }}">
                                                    MÉDICO: {{ Str::upper($dayeauxiliare->eauxiliare->doctore->apellidos) }}, {{ Str::upper($dayeauxiliare->eauxiliare->doctore->nombres) }}
                                                    {{ date('H:i',strtotime($dayeauxiliare->hora)) }}
                                                    @if ($dayeauxiliare->estado == "realizado")
                                                        <i class="far fa-check-circle"></i>
                                                    @else
                                                        <i class="fas fa-hourglass-half"></i>
                                                    @endif
                                                </p>
                                                @isset($dayeauxiliare->user->lastname)
                                                    <p class="m-1 p-0 border rounded">
                                                        {{ Str::upper($dayeauxiliare->user->lastname) }}, {{ Str::limit(Str::title($dayeauxiliare->user->name),1,'.') }}
                                                        {{ date('d-m-Y H:i',strtotime($dayeauxiliare->registro)) }}
                                                    </p>
                                                @endisset
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                @endforeach    
                            </tr>
                            @endforeach
                    </tbody>
                    {{-- PROCEDIMIENTOS --}}
                    <thead>
                        <tr>
                            <th class="m-0 p-0 bg-secondary">PROCEDIMIENTOS</th>
                            @foreach ($kardex->dias as $dia)
                                <th class="m-0 p-0 text-center border">{{ date('d-m-Y', strtotime($dia->fecha)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.8rem">
                        <tr>
                            <td class="m-0 p-0 border"></td>
                        @foreach ($kardex->dias as $dia)
                            <td class="m-0 p-0 border">
                                <div class="d-flex">
                                    @foreach ($dia->dprocedmientos as $detalle)
                                    <div>
                                        <p class="m-1 p-0 border rounded text-{{ horacolor($detalle->hora)->color }}">
                                            {{ date('H:m',strtotime($detalle->hora)) }}
                                            @if ($detalle->registro != null)
                                                <i class="far fa-check-circle"></i>
                                            @else
                                                <i class="fas fa-hourglass-half"></i>
                                            @endif
                                        </p>
                                        @isset($detalle->registro)
                                            <p class="m-1 p-0 border">
                                                {{ date('d-m-Y H:i',strtotime($detalle->registro)) }}
                                                {{ Str::upper($detalle->user->lastname) }} {{ Str::limit(Str::upper($detalle->user->name),1,'.') }}
                                            </p>
                                        @endisset
                                    </div>        
                                    @endforeach
                                </div>
                                {{-- {{ date('d-m-Y',strototime($dia->dprocedmientos->hora)) }} --}}
                            </td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
