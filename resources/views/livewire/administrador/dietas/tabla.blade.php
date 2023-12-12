<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Denominacion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dietas as $key => $dieta)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $dieta->nombre }}</td>
                            <td class="text-center" style="width: 120px">
                                <button type="button" class="btn btn-primary mt-1" wire:click="dieta_edit({{ $dieta->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <x-Modal :id="'delete-' . $dieta->id" title="Confirmar Accion" type="danger"
                                    icon="fas fa-trash-alt" route="administrador.dietas.destroy"
                                    :parameter="$dieta->id" method='DELETE'>
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
                            {{ $dietas->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>