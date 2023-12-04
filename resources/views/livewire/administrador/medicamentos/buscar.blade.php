<div class="card">   
    <div class="card-header bg-info">
        <i class="fas fa-search"></i> Ingrese opciones para la busqueda:
    </div>
    <div class="card-body">
        <x-entrada>
            <x-slot:start>
                <select class="custom-select" wire:model.live="opcione" required>
                    <option value="" disabled selected>Opcion...</option>
                    <option value="codigo">Código</option>
                    <option value="indicaciones">Inidicaciones</option>
                    <option value="denominacion">Denominación</option>
                    <option value="especificaciones">Especificaciones</option>
                </select>
            </x-slot:start>
            <input type="text" class="form-control ml-1 mr-1" wire:model.live="text" >
        </x-entrada>
    </div>
</div>
