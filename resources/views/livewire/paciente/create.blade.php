<div class="col-sm-12 col-md-6">
    <x-entrada>
        <input type="text" class="form-control" placeholder="DNI" wire:model="paciente_store.dni" required pattern=".{8,8}">
        <x-slot name="end">
            <button class="btn btn-info" type="button" wire:click="buscardni()">
                <i class="fas fa-search"></i>
            </button>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-6">
    <x-entrada>
        <input type="text" class="form-control" placeholder="Nombres" wire:model="paciente_store.nombres" required>
        <x-slot name="end">
            <i class="far fa-id-card btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-6 mt-2">
    <x-entrada>
        <input type="text" class="form-control" placeholder="Apellido Paterno" wire:model="paciente_store.apellidopaterno" required>
        <x-slot name="end">
            <i class="far fa-id-card btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-6 mt-2">
    <x-entrada>
        <input type="text" class="form-control" placeholder="Apellido Materno" wire:model="paciente_store.apellidomaterno" required>
        <x-slot name="end">
            <i class="far fa-id-card btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-3 mt-2">
    <x-entrada>
        <select class="form-control" wire:model="paciente_store.sexo" required>
            <option value="" disabled selected>Sexo</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
        <x-slot name="end">
            <button class="btn btn-danger">
                <i class="fas fa-venus-mars"></i>
            </button>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-3 mt-2">
    <x-entrada>
        <input type="number" step="1" min="0" max="100" class="form-control" placeholder="Edad" wire:model="paciente_store.edad" required>
        <x-slot name="end">
            <i class="far fa-user-circle btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-3 mt-2">
    <x-entrada>
        <input type="number" step="0.1" min="0" max="350" class="form-control" placeholder="Talla cm." wire:model="paciente_store.talla" required>
        <x-slot name="end">
            <i class="fab fa-instalod btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-3 mt-2">
    <x-entrada>
        <input type="number" step="0.1" min="0" max="100" class="form-control" placeholder="Peso Kg." wire:model="paciente_store.peso" required>
        <x-slot name="end">
            <i class="fab fa-instalod btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-4 mt-2">
    <x-entrada>
        <input type="text" class="form-control" placeholder="Historia" wire:model="paciente_store.historia" required>
        <x-slot name="end">
            <button class="btn btn-success">
                <i class="fas fa-file-medical-alt"></i>
            </button>
        </x-slot>
    </x-entrada>
</div>