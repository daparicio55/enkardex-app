<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctores as $key => $doctore)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $doctore->apellidos }}</td>
                            <td>{{ $doctore->nombres }}</td>
                            <td class="text-center" style="width: 120px">
                                <button type="button" class="btn btn-primary mt-1" wire:click="doctore_edit({{ $doctore->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <x-Modal :id="'delete-' . $doctore->id" title="Confirmar Accion" type="danger"
                                    icon="fas fa-trash-alt" route="administrador.medicos.destroy"
                                    :parameter="$doctore->id" method='DELETE'>
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
                            {{ $doctores->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>