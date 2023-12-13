<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DNI</th>
                        <th>APELLIDOS, Nombres</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($licenciados as $key => $licenciado)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $licenciado->dni }}</td>
                            <td>
                                {{  Str::upper($licenciado->lastname) }}, {{ Str::title($licenciado->name) }}
                            </td>
                            <td>{{ $licenciado->email }}</td>
                            <td class="text-center" style="width: 120px">
                                <button type="button" class="btn btn-primary mt-1" wire:click="user_edit({{ $licenciado->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <x-Modal :id="'delete-' . $licenciado->id" title="Confirmar Accion" type="danger"
                                    icon="fas fa-trash-alt" route="administrador.licenciados.destroy"
                                    :parameter="$licenciado->id" method='DELETE'>
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
                            {{ $licenciados->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>