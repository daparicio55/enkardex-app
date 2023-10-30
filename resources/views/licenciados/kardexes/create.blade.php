@extends('adminlte::page')

@section('title', 'kardex')

@section('content_header')
    <h1>Nueva hoja de tratamiento</h1>
    <a href="{{ route('licenciados.kardexes.index') }}" class="btn btn-warning mt-1">
        <i class="fas fa-arrow-circle-left"></i> Regresar
    </a>
    @php
        $config = [
            "placeholder" => "Seleccione multiples medicamentos...",
        ];
    @endphp
@stop

@section('content')
<div class="row">
    {{-- DATOS DEL PACIENTE --}}
    <div class="col-sm-12">
        <x-adminlte-card title="Paciente" theme="info" icon="fas fa-user-injured" collapsible="collapsed">
            <div class="row">
                {{-- botton para buscar el DNI --}}
                <div class="col-sm-12">
                    <x-adminlte-input name="txtdni" label="Ingrese Numero de DNI" placeholder="search" igroup-size="md">
                        <x-slot name="appendSlot">
                            <x-adminlte-button id="btndni" theme="outline-info" label="Buscar"/>
                        </x-slot>
                        <x-slot name="prependSlot">
                            <div class="input-group-text text-info">
                                <i class="fas fa-search"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    
                </div>
                {{-- FIN botton para buscar el DNI --}}
                {{-- datos del paciente y alergias --}}
                <div class="col-sm-12 col-md-6">
                    <x-adminlte-input name="nombres" label="Nombres" placeholder="ingrese nombres"/>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-adminlte-input name="apellidos" label="Apellidos" placeholder="ingrese apellidos"/>
                </div>
                <div class="col-sm-12 col-md-2">
                    <x-adminlte-input name="edad" label="Edad" placeholder="ingrese edad"/>
                </div>
                <div class="col-sm-12 col-md-2">
                    <label for="sexo">Sexo</label>
                    <x-adminlte-select name="sexo">
                        <x-adminlte-options :options="['Masculino'=>'Masculino','Femenino'=>'Femenino']" placeholder="Seleccione..."/>
                    </x-adminlte-select>
                </div>
                <div class="col-sm-12 col-md-2">
                    <x-adminlte-input name="historia" label="H. Clínica" placeholder="ingrese historia"/>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-adminlte-select2 id="alergias" name="alergias[]" label="Alergias"
                        label-class="text-danger" igroup-size="md" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                        </x-slot>
                        @foreach ($medicamentos as $medicamento)
                            <option value="{{ $medicamento->id }}">{{ $medicamento->denominacion }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
            </div>
        </x-adminlte-card>
    </div>
    {{-- FIN DATOS DE PACIENTE --}}
    {{-- DATOS DEL MEDICO Y AMBIENTE--}}
    <div class="col-sm-12">
        <x-adminlte-card title="Médico y Ambiente" theme="success" icon="fas fa-user-md" collapsible="collapsed">
            <div class="row">
                <div class="col-sm-12">
                    <x-adminlte-select2 name="medico" label="Nombre del Médico" igroup-size="md" data-placeholder="Selccione...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-user-md"></i>
                            </div>
                        </x-slot>
                        @foreach ($doctores as $doctore)
                            <option value="{{ $doctore->id }}">{{ Str::upper($doctore->apellidos) }}, {{ Str::title($doctore->nombres) }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                {{-- SERVICIOS --}}
                <div class="col-sm-8">
                    <x-adminlte-select2 name="servicio" label="Nombre del Servicio" igroup-size="md" data-placeholder="Selccione...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-file-medical"></i>
                            </div>
                        </x-slot>
                        @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                {{-- AMBIENTES --}}
                <div class="col-sm-4">
                    <x-adminlte-select2 name="ambiente" label="Ambiente" igroup-size="md" data-placeholder="Selccione...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-bed"></i>
                            </div>
                        </x-slot>
                        @foreach ($ambientes as $ambiente)
                            <option value="{{ $ambiente->id }}">{{ $ambiente->nombre }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
                {{-- diagnostico --}}
                <div class="col-sm-12">
                    <x-adminlte-textarea name="diagnostico" label="Diagnóstico" rows=5 igroup-size="md" placeholder="Describa el diagnostico...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-info" >
                                <i class="fas fa-lg fa-file-alt text-white"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-textarea>
                </div>
            </div>
        </x-adminlte-card>
    </div>
    {{-- FIN DATOS DE MEDICO Y EL AMBIENTE--}}
</div>
<div class="row">
    <div class="col-sm-12">
        <x-adminlte-card title="Fechas de Ingreso y días de Atencion" theme="danger" icon="fas fa-calendar-alt" collapsible>
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <x-inputdate name="fingreso" id="fingreso" label="F. Ingreso">
                        <x-slot name="pre">
                            <span class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </x-slot>
                    </x-inputdate>
                </div>
                <div class="col-sm-12 col-md-3">
                    <x-inputtime name="hingreso" id="hingreso" label="H. Ingreso">
                        <x-slot name="pre">
                            <span class="input-group-text bg-gradient-info">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </x-slot>
                    </x-inputdate>
                    {{-- @php
                        $config02 = ['format' => 'LT'];
                    @endphp
                    <x-adminlte-input-date name="hingreso" label="H Ingreso" :config="$config02" placeholder="Choose a time...">
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-info">
                                <i class="fas fa-clock"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input-date> --}}
                </div>
            </div>
        </x-adminlte-card>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
        </button>
    </div>
</div>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop