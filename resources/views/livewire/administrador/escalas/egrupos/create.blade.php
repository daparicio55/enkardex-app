<form wire:submit="egrupo_store()">
    <div class="card">
        <div class="card-header bg-info">
            <i class="fas fa-layer-group"></i> Registro de nuevo grupo.
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="nombre" wire:model="egrupoform.nombre" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-stream"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-outline-danger" wire:click="$set('egrupoform.formulario',false)">
                <i class="fas fa-times-circle"></i> Cerrar
            </button>
            <button type="submit" class="btn btn-info">
                <i class="fas fa-save"></i> Guardar
            </button>
        </div>
    </div>
</form>