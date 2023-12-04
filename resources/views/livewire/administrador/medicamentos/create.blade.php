<form wire:submit="medicamento_store()">
    <div class="card">
        <div class="card-header bg-success">
            <i class="fas fa-prescription-bottle-alt"></i> Registro de nuevo medicamento
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="código" wire:model="medicamento_create.codigo" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-barcode"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-4">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="unidad" wire:model="medicamento_create.unidad" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-ruler-horizontal"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-4">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="restriccion" wire:model="medicamento_create.restriccion" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-ban"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-12">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="denominacion" wire:model="medicamento_create.denominacion" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-stream"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-12">
                    <x-entrada>
                        <textarea class="form-control" rows="10" placeholder="especificaciones" wire:model="medicamento_create.especificaciones" required></textarea>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-text-height"></i>
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