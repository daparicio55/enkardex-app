<div>
    <button class="btn btn-success mb-3" wire:click="$set('datos',true)">
        <i class="fas fa-tablets"></i> Registrar Paciente
    </button>
    @if ($datos)
        @include('livewire.licenciados.createPaciente')
    @endif
    {{-- @if ($buscar)
        @include('livewire.administrador.medicamentos.buscar')
    @endif --}}
    @if ($tabla)
        @include('livewire.licenciados.tablaPaciente')
    @endif
</div>