<div>
    <button class="btn btn-success mb-3" wire:click="$set('datos',true)">
        <i class="fas fa-pizza-slice"></i> Registrar Dieta
    </button>
    @if ($datos)
        @include('livewire.administrador.dietas.create')
    @endif
    {{-- @if ($buscar)
        @include('livewire.administrador.medicamentos.buscar')
    @endif --}}
    @if ($tabla)
        @include('livewire.administrador.dietas.tabla')
    @endif
</div>
