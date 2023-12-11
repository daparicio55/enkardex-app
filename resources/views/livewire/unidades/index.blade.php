<div>
    <button class="btn btn-success mb-3" wire:click="$set('datos',true)">
        <i class="fas fa-tablets"></i> Registrar Unidad
    </button>
    @if ($datos)
        @include('livewire.administrador.unidades.create')
    @endif
    @if ($tabla)
        @include('livewire.administrador.unidades.tabla')
    @endif
</div>
