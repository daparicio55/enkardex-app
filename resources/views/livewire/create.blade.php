<div class="col-sm-12 col-md-4 mt-2">
    <x-entrada>
        <input type="date" class="form-control" placeholder="Fecha" wire:model="fecha" required>
        <x-slot name="end">
            <i class="fas fa-calendar-alt btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-4 mt-2">
    <x-entrada>
        <input type="time" class="form-control" placeholder="Hora" wire:model="hora" required>
        <x-slot name="end">
            <i class="far fa-clock btn btn-info"></i>
        </x-slot>
    </x-entrada>
</div>
{{-- SERVICIO Y AREA --}}
<div class="col-sm-12 col-md-8">
    <x-entrada>
        <select class="form-control" wire:model="servicio_id" required>
            <option value="" disabled selected>Seleccionar un servicio</option>
            @foreach ($servicios as $servicio)
                <option wire:key="servicio-{{ $servicio->id }}" value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
            @endforeach
        </select>
        <x-slot name="end">
            <button class="btn btn-info">
                <i class="fas fa-concierge-bell"></i>
            </button>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12 col-md-4">
    <x-entrada>
        <select class="form-control" wire:model="ambiente_id" required>
            <option value="" disabled selected>Ambiente</option>
            @foreach ($ambientes as $ambiente)
                <option wire:key="ambiente-{{ $ambiente->id }}" value="{{ $ambiente->id }}">{{ $ambiente->nombre }}</option>
            @endforeach
        </select>
        <x-slot name="end">
            <button class="btn btn-info">
                <i class="fas fa-building"></i>
            </button>
        </x-slot>
    </x-entrada>
</div>
{{-- DOCTOR --}}
<div class="col-sm-12">
    <x-entrada>
        <select class="form-control" wire:model="doctore_id" required>
            <option value="" disabled selected>Seleccionar un Doctor</option>
            @foreach ($doctores as $doctore)
                <option wire:key="doctore-{{ $doctore->id }}" value="{{ $doctore->id }}">
                    {{ Str::upper($doctore->apellidos) }} {{ Str::title($doctore->nombres) }}
                </option>
            @endforeach
        </select>
        <x-slot name="end">
            <button class="btn btn-info">
                <i class="fas fa-user-md"></i>
            </button>
        </x-slot>
    </x-entrada>
</div>
<div class="col-sm-12">
    <textarea rows="5" class="form-control" placeholder="Ingrese diagnostico de Médico" wire:model="diagnostico"></textarea>
</div>