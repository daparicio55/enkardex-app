<div>
    <form wire:submit="calcular()">
        <div class="row justify-content-center pt-5">
            <div class="col-sm-12 col-md-6">
                <div class="card text-center">
                    <div class="card-header bg-info">
                        <h5 class="h5 mb-0">
                            <i class="fas fa-child"></i> Supercifie Corporal en Niños
                        </h5>
                        <p class="mb-0">
                            <button class="btn btn-primary mt-2 mb-0" type="button" wire:click="refresh()">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <label for="" class="mt-4">Peso (Kg.)</label>
                                <input type="number" min="1" max="250" class="form-control" required wire:model="peso">
                                <label for="" class="mt-3">Talla (cm.)</label>
                                <input type="number" min="1" max="300" class="form-control" required wire:model="talla">
                                {{-- <div class="mt-3 border rounded p-1">
                                    <label for="" class="mt-1">Temperatura</label>
                                    <div class="form-check text-left">
                                        <input class="form-check-input" type="radio" name="exampleRadios" required wire:model="temperatura" value="option1">
                                        <label class="form-check-label" for="exampleRadios1">
                                        < 37 °C
                                        </label>
                                    </div>
                                    <div class="form-check text-left">
                                        <input class="form-check-input" type="radio" name="exampleRadios" required wire:model="temperatura" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                        37 °C - 37.9 °C
                                        </label>
                                    </div>
                                    <div class="form-check text-left">
                                        <input class="form-check-input" type="radio" name="exampleRadios" required wire:model="temperatura" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                        38 °C - 39 °C
                                        </label>
                                    </div>
                                    <div class="form-check text-left">
                                        <input class="form-check-input" type="radio" name="exampleRadios" required wire:model="temperatura" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                        > 39 °C
                                        </label>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-calculator"></i> CALCULAR
                            </button>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <p>Resultados:</p>
                                <p class="text-center">
                                    <input type="text" readonly class="form-control" wire:model="resultado">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>