<div>
    <form wire:submit="calcular()">
        <div class="row justify-content-center pt-5">
            <div class="col-sm-12 col-md-6">
                <div class="card text-center">
                    <div class="card-header bg-info">
                        <h5 class="h5 mb-0">
                            <i class="fas fa-bacteria"></i> Presión Arterial Media
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
                                <label for="" class="mt-4">Presión Sistólica</label>
                                <input type="number" min="1" max="250" class="form-control" required wire:model="psistolica">
                                <label for="" class="mt-4">Presión Diastólica</label>
                                <input type="number" min="1" max="300" class="form-control" required wire:model="pdiastolica">
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
