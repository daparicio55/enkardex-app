<div>
    <button class="btn btn-success mb-3" wire:click="$set('datos',true)">
        <i class="fas fa-tablets"></i> Registrar Servicio
    </button>
    @if ($datos)
        @include('livewire.administrador.servicios.create')
    @endif
    {{-- @if ($buscar)
        @include('livewire.administrador.servicios.buscar')
    @endif --}}
    @if ($tabla)
        @include('livewire.administrador.servicios.tabla')
    @endif
</div>
