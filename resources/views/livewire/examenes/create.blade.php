<form wire:submit="diaexamenestore()">
    <div class="row">
        <div class="col-sm-12">
            <x-entrada>
                <select class="form-control" required wire:model="diaexamene_create.examene_id" required>
                    <option value="" disabled selected>Examenes...</option>
                    @foreach ($examenes as $examen)
                        <option value="{{ $examen->id }}" wire:key="diaexamene{{ $examen->id }}">{{ $examen->nombre }}</option>
                    @endforeach
                </select>
                <x-slot name="end">
                    <button type="submit" class="input-group-text bg-gradient-success">
                        <i class="far fa-plus-square"></i>
                    </button>
                </x-slot>
            </x-entrada>
        </div>
        <div class="col-sm-12">
            <x-entrada>
                <select class="form-control" wire:model="diaexamene_create.doctore_id" required>
                    <option value="" disabled selected>Médico..</option>
                    @foreach ($doctores as $doctore)
                        <option value="{{ $doctore->id }}" wire:key="diaexamenmedico{{ $doctore->id }}">
                            {{ Str::upper($doctore->apellidos) }} {{ Str::title($doctore->nombres) }}
                        </option>
                    @endforeach
                </select>
                <x-slot name="end">
                    <div class="input-group-text text-info">
                        <i class="fas fa-user-md"></i>
                    </div>
                </x-slot>
            </x-entrada>
        </div>
    </div>
</form>