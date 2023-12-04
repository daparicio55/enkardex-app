<form wire:submit="diadietastore">
    <div class="row">
        <div class="col-sm-12">
            <x-entrada>
                <select class="form-control" required wire:model="dieta_id">
                    <option value="" disabled selected>Dieta...</option>
                    @foreach ($dietas as $dieta)
                        <option value="{{ $dieta->id }}" wire:key="selectdieta{{ $dieta->id }}">{{ $dieta->nombre }}</option>
                    @endforeach
                </select>
                <x-slot name="end">
                    <button type="submit" class="input-group-text bg-gradient-success">
                        <i class="far fa-plus-square"></i>
                    </button>
                </x-slot>
            </x-entrada>
        </div>
    </div>
</form>