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
                    @foreach ($unidades as $key => $unidade)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $unidade->nombre }}</td>
                            <td class="text-center" style="width: 120px">
                                <button type="button" class="btn btn-primary mt-1" wire:click="unidade_edit({{ $unidade->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <x-Modal :id="'delete-' . $unidade->id" title="Confirmar Accion" type="danger"
                                    icon="fas fa-trash-alt" route="administrador.unidades.destroy"
                                    :parameter="$unidade->id" method='DELETE'>
                                    <x-slot:body>
                                        <p class="text-danger mb-0">¿Esta seguro que desea eliminar?</p>
                                    </x-slot:body>
                                </x-Modal>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            {{ $unidades->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>