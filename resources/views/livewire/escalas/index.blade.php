<div>
    <button class="btn btn-success mb-3" wire:click="$set('escalaform.formulario',true)">
        <i class="fas fa-tablets"></i> Registrar Escala
    </button>
    @if ($escalaform->formulario)
        @include('livewire.administrador.escalas.create')
    @endif
    @if ($egrupoform->formulario)
        @include('livewire.administrador.escalas.egrupos.create')
    @endif
    @if ($egvaloreform->formulario)
        @include('livewire.administrador.escalas.egrupos.egvalores.create')
    @endif
    @include('livewire.administrador.escalas.tabla')
</div>
