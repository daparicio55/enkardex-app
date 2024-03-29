@extends('adminlte::page')

@section('title', 'INICIO')

{{-- @section('content_header')
    <h1>Panel de Administracion</h1>
@stop --}}

@section('content')
{{-- <x-adminlte-card title="Dark Card" theme="dark" icon="fas fa-lg fa-moon mt-2">
    A dark theme card...
</x-adminlte-card> --}}
<div class="row">
    {{-- <div class="col-sm-6 col-md-4 mt-3">
        <x-adminlte-info-box title="Reputation" text="0/1000" icon="fas fa-lg fa-medal text-dark"
        theme="danger" id="ibUpdatable" progress=0 progress-theme="teal"
        description="0% reputation completed to reach next level"/>
    </div> --}}
    <div class="col-sm-6 col-md-4 mt-3">
        <a href="{{ route('licenciados.kardexes.index') }}">
            <x-adminlte-info-box text="Kardex Digital" icon="fas fa-lg fa-tasks text-white" theme="warning"
            icon-theme="dark" id="ibkardex" progress=75 progress-theme="dark"
            description="hojas de tratamientos terapeuticos registratos en el sistema informático"/>
        </a>
    </div>
    <div class="col-sm-6 col-md-4 mt-3">
        <a href="#">
            <x-adminlte-info-box text="Pacientes" icon="fas fa-lg fa-user-injured text-white" theme="success"
            icon-theme="dark" id="ibpaciente" progress=75 progress-theme="dark"
            description="hojas de tratamientos terapeuticos registratos en el sistema informático"/>
        </a>
    </div>
    <div class="col-sm-12 col-md-12 mt-3">
        <canvas id="medicamento"></canvas>
    </div>
    <div class="col-sm-12 col-md-12 mt-3">
        @php
            $header;
            $datos;
        @endphp
        @foreach ($medicamentos as $medicamento)
            @foreach ($medicamento->indicationes as $indicatione)
                @php
                    $datos[] = $indicatione->dia_indicaciones()->where('tipo','aplicado')->count();
                @endphp
            @endforeach
            @php
                $header[] = Str::limit($medicamento->denominacion, 15);
            @endphp
        @endforeach
        @if (isset($header) || isset($datos))
            @php
                $hmedicamentos = json_encode($header);
                $dmedicamentos = json_encode($datos);
            @endphp
        @endif
            
    </div>
</div>

@stop
@section('footer')
    <x-footer-buttons />
@stop
@push('js')
<script>
    $(document).ready(function() {
        let iBoxKardex = new _AdminLTE_InfoBox('ibkardex');
        let iBoxPaciente = new _AdminLTE_InfoBox('ibpaciente');
        let updateIBox = () =>
        {
            // Update data.
            let rep = Math.floor(1000 * Math.random());
            let idx = rep < 100 ? 0 : (rep > 500 ? 2 : 1);
            let progress = Math.round(rep * 100 / 1000);
            let data = {progress};
            iBoxKardex.update(data);
            iBoxPaciente.update(data);
        };
        setInterval(updateIBox, 5000);
    });   
</script>

@if (isset($header) || isset($datos))
    <script>
            let ctx = document.getElementById('medicamento').getContext("2d");
            let myChart = new Chart(ctx,{
                type: "bar",
                data: {
                    labels: <?= $hmedicamentos ?>,
                    datasets: [{
                        label: 'Datos',
                        data: <?= $dmedicamentos ?>,
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });        
    </script>
@endif
@endpush