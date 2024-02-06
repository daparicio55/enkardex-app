<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($escalas as $key => $escala)
                        <tr>
                            <td style="width: 20px" class="pt-2 pb-1">{{ $key + 1 }}</td>
                            <td class="pt-2 pb-1">{{ $escala->nombre }}</td>
                            <td style="width: 160px" class="pt-0 pb-1">
                                <button type="button" class="btn btn-info mt-1" title="agregar Grupo" wire:click="egrupo_create({{ $escala->id }})">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                                <button type="button" class="btn btn-primary mt-1" wire:click="escala_edit({{ $escala->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <x-Modal :id="'delete-' . $escala->id" title="Confirmar Accion" type="danger mt-1"
                                    icon="fas fa-trash-alt" route="administrador.escalas.destroy"
                                    :parameter="$escala->id" method='DELETE'>
                                    <x-slot:body>
                                        <p class="text-danger mb-0">¿Esta seguro que desea eliminar?</p>
                                    </x-slot:body>
                                </x-Modal>
                            </td>
                            
                        </tr>
                        @include('livewire.administrador.escalas.egrupos.tabla')
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            {{ $escalas->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>