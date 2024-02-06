<form wire:submit="egvalore_store()">
    <div class="card">
        <div class="card-header bg-primary">
            <i class="fas fa-layer-group"></i> Registro de nuevo Valor.
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="nombre" wire:model="egvaloreform.nombre" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-stream"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="number" min="0" class="form-control" placeholder="valor" wire:model="egvaloreform.valor" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-outline-danger" wire:click="$set('egvaloreform.formulario',false)">
                <i class="fas fa-times-circle"></i> Cerrar
            </button>
            <button type="submit" class="btn btn-info">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </div>
</form>