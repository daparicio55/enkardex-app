<div>

    <x-adminlte-card title="Paciente" theme="info" icon="fas fa-user-injured" collapsible>
        @if ($kardex_id <> 0)
            <x-slot name="toolsSlot">
                Número: {{ ceros($kardex->numero) }}
            </x-slot>    
        @endif
        <form wire:submit="storekardex">
            <div class="row">
                @include('livewire.paciente.create')
                @include('livewire.create')
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-info d-flex ml-auto">
                        <p class="m-1">
                            <i class="fas fa-save"></i> Guardar
                        </p>
                    </button>
                </div>
            </div>
        </form>
    </x-adminlte-card>
    @include('livewire.medicamentos.create')
@if ($kardex_id <> 0)
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach ($kardex->dias as $key=>$dia)
            <li class="nav-item ml-2" role="presentation" wire:key="li{{ $dia->id }}">
                <button @if($dia->id == $dia_id) class="nav-link active" @else class="nav-link" @endif
                    id="t{{ $dia->id }}-tab" data-toggle="tab"
                    @if($dia->id == $dia_id) aria-selected="true" @else aria-selected="false" @endif
                    data-target="#t{{ $dia->id }}" type="button" role="tab" aria-controls="t{{ $dia->id }}" 
                    aria-selected="false" wire:click="selectday({{ $dia->id }})" wire:key="btn{{ $dia->id }}">
                    {{ $dia->fecha }}
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach ($kardex->dias as $key=>$dia)
          <div @if($dia->id == $dia_id) class="tab-pane active"  @else class="tab-pane" @endif
                id="t{{ $dia->id }}" role="tabpanel" aria-labelledby="t{{ $dia->id }}-tab" wire:key="tabpane{{ $dia->id }}">
                <div class="container ml-1 mr-1 mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th colspan="2">
                                                <button class="btn btn-danger mt-1  btn-sm" wire:click="diadestroy({{ $dia->id }})">
                                                    <i class="fas fa-trash-alt"></i> Eliminar Este día
                                                </button>    
                                                <button class="btn btn-info mt-1  btn-sm" wire:click="diacreate">
                                                    <i class="far fa-calendar-plus"></i> Agregar un día
                                                </button>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="pl-0 pb-0">Procedimientos</th>
                                            <th class=pb-0></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form wire:submit="diaprocedimientostore()">
                                                            <x-entrada>
                                                                <select id="selectprocedimientos" class="form-control" 
                                                                wire:model="diaprocedimiento_create.procedimiento_id">
                                                                    <option value="" disabled selected>Procedimientos...</option>
                                                                    @foreach ($procedimientos as $procedimiento)
                                                                        <option value="{{ $procedimiento->id }}">{{ $procedimiento->nombre }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <x-slot name="end">
                                                                    <button type="submit" class="btn btn-success">
                                                                        <i class="far fa-plus-square"></i>
                                                                    </button>
                                                                </x-slot>
                                                            </x-entrada>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="d-flex justify-content-around pt-1 pb-0">
                                                @foreach ($dia->dprocedmientos as $dprocedmiento)
                                                <div class="mt-1 text-center">
                                                    <span class="d-block">
                                                        {{ $dprocedmiento->procedimiento->nombre }}
                                                        @if ($dprocedmiento->done()->count() == 1)
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            <i class="fas fa-hourglass-half"></i>
                                                        @endif
                                                    </span>
                                                    <button class="btn btn-info btn-sm"
                                                    wire:click="donediaprocedimientostore({{ $dprocedmiento->id }})">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm"
                                                    wire:click="diaprocedimientodestroy({{ $dprocedmiento->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0 pb-0">Exámenes Auxiliares</th>
                                            <th class=pb-0></th>
                                        </tr>
                                        <tr>
                                            <th style="width: 40%">
                                                @include('livewire.examenes.create')
                                            </th>
                                            <td class="d-flex justify-content-around pt-1 pb-0">
                                                @foreach ($dia->dexamenes as $dexamene)
                                                <div class="mt-3 text-center">
                                                    <span class="d-block">
                                                        {{ $dexamene->examene->nombre }}
                                                        @if ($dexamene->done()->count() == 1)
                                                            <i class="fas fa-check"></i>
                                                        @else
                                                            <i class="fas fa-hourglass-half"></i>
                                                        @endif
                                                    </span>
                                                    <button class="btn btn-info btn-sm" wire:click="donediaexamenestore({{ $dexamene->id }})">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" wire:click="diaexamendestroy({{ $dexamene->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0 pb-0">Dietas</th>
                                            <th class=pb-0></th>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">
                                                <span class="d-block">
                                                    @include('livewire.dietas.create')
                                                </span>
                                            </td>
                                            <td class="d-flex justify-content-around pt-1 pb-0">
                                                @foreach ($dia->ddietas as $ddieta)
                                                    <span wire:key="ddieta{{ $ddieta->id }}" class="pr-4 pl-4 d-flex align-items-center">
                                                        {{ $ddieta->dieta->nombre }}
                                                        <button class="btn btn-danger btn-sm ml-2 mt-2" wire:click="diadietadelete({{ $ddieta->id }})">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>    
                                                    </span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-0 pb-0">Medicamentos</th>
                                            <th class=pb-0></th>
                                        </tr>
                                        @foreach ($kardex->indicaciones as $indicacione)
                                            <tr wire:key="dia{{ $dia->id }}in{{ $indicacione->id }}">
                                                <td class="pl-0 pr-0 pt-1 pb-0" style="width: 40%">
                                                    <button class="btn btn-danger btn-sm" wire:click="medicamentodestroy({{ $indicacione->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                    {{ $indicacione->medicamento->denominacion }} 
                                                    {{ $indicacione->medicamento->especificaciones }}
                                                    <p class="mb-1">
                                                        {{ $indicacione->dosis }} | {{ $indicacione->via->nombre }} | c/{{ $indicacione->frecuencia }}h
                                                    </p>
                                                </td>
                                                @php
                                                    $horas = horas($kardex->id,$dia->id,$indicacione->id);
                                                @endphp
                                                <td class="pl-0 pr-0 pt-1 pb-0 d-flex justify-content-around">
                                                    @foreach ($horas as $hora)
                                                    <div class="text-center">
                                                        <span class="text-{{ $hora->color }}">
                                                            {{ $hora->hora }}
                                                            <i class="{{ icono($indicacione->id,$dia->id,$hora->hora) }}"></i>
                                                        </span>
                                                        <span class="d-block">
                                                            <button class="btn btn-secondary btn-sm" 
                                                            wire:click="diaindicacionecreate('{{ $hora->hora }}',{{ $dia->id }},{{ $indicacione->id }},'no aplica')">
                                                                <i class="fas fa-ban"></i>
                                                            </button>
                                                            <button class="btn btn-info btn-sm"
                                                            wire:click="diaindicacionecreate('{{ $hora->hora }}',{{ $dia->id }},{{ $indicacione->id }},'aplicado')">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        @endforeach
    </div>
@endif
</div>
<script>
    document.addEventListener('DOMContentLoaded',function(){
        $('#medicamento').on('change', function () {
            @this.set('medicamento_id',this.value);
        });
    });
</script>