<form wire:submit="medicamentostore()">
<x-adminlte-card title="Medicamentos" theme="danger" icon="fas fa-procedures" collapsible>
    <div class="row">
        <div class="col-sm-12" wire:ignore>
            <x-adminlte-select2 name="medicamento" data-placeholder="Medicamento..." required>
                <option/>
                @foreach ($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}">{{ $medicamento->denominacion }} {{ $medicamento->especificaciones }}</option>
                @endforeach
                <x-slot name="appendSlot">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-pills"></i>
                    </div>
                </x-slot>
            </x-adminlte-select2>
        </div>
        <div class="col-sm-4">
            <x-entrada>
                <input class="form-control" placeholder="Dosis" type="text" wire:model="medicamento_create.dosis" required>
                <x-slot name="end">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-ruler-vertical"></i>
                    </div>
                </x-slot>
            </x-entrada>
        </div>
        <div class="col-sm-4">
            <x-entrada>
                <select class="form-control" wire:model="medicamento_create.via_id" required>
                    <option value="" disabled selected>Vias</option>
                    @foreach ($vias as $via)
                        <option value="{{ $via->id }}">{{ $via->nombre }}</option>
                    @endforeach
                </select>
                <x-slot name="end">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-tablets"></i>
                    </div>
                </x-slot>
            </x-entrada>
        </div>
        <div class="col-sm-4">
            <x-entrada>
                <select class="form-control" wire:model="medicamento_create.frecuencia" required>
                    <option value="" disabled selected>Frecuencia</option>
                    @for ($i = 1; $i < 24; $i++)
                        <option value="{{ $i }}">{{ $i }}H</option>
                    @endfor
                </select>
                <x-slot name="end">
                    <div class="input-group-text bg-gradient-danger">
                        <i class="fas fa-recycle"></i>
                    </div>
                </x-slot>
            </x-entrada>
        </div>
        <div class="col-sm-12 mt-3">
            <button type="submit" class="btn btn-danger d-flex ml-auto">
                <p class="m-1">
                    <i class="fas fa-save"></i> Guardar
                </p>
            </button>
        </div>
    </div>
</x-adminlte-card>
</form>