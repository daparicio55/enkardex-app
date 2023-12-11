<form wire:submit="doctore_store()">
    <div class="card">
        <div class="card-header bg-success">
            <i class="fas fa-prescription-bottle-alt"></i> Registro de nuevo Doctores
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="Apellidos" wire:model="doctore_create.apellidos" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-barcode"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="Nombres" wire:model="doctore_create.nombres" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-ruler-horizontal"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-outline-danger" wire:click="$set('datos',false)">
                <i class="fas fa-times-circle"></i> Cerrar
            </button>
            <button type="submit" class="btn btn-info">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </div>
</form>