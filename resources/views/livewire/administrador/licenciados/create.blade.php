<form wire:submit="user_store()">
    <div class="card">
        <div class="card-header bg-success">
            <i class="fas fa-utensils"></i> Registro de nuevo medicamento
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="apellidos" wire:model="user.lastname" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-stream"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="nombres" wire:model="user.name" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-stream"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="dni" wire:model="user.dni" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-id-card"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                <div class="col-sm-12 col-md-6">
                    <x-entrada>
                        <input type="text" class="form-control" placeholder="correo" wire:model="user.email" required>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-envelope-open-text"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div>
                {{-- <div class="col-sm-12 col-md-12">
                    <x-entrada>
                        <textarea class="form-control" rows="10" placeholder="descripcion" wire:model="dieta_create.descripcion" required></textarea>
                        <x-slot:end>
                            <span class="input-group-text">
                                <i class="fas fa-text-height"></i>
                            </span>
                        </x-slot:end>
                    </x-entrada>
                </div> --}}
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