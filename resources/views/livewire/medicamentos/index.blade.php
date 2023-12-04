<div>
    <button class="btn btn-success mb-3" wire:click="$set('datos',true)">
        <i class="fas fa-tablets"></i> Registrar Medicamento
    </button>
    @if ($datos)
        @include('livewire.administrador.medicamentos.create')
    @endif
    @if ($buscar)
        @include('livewire.administrador.medicamentos.buscar')
    @endif
    @if ($tabla)
        @include('livewire.administrador.medicamentos.tabla')
    @endif
</div>
