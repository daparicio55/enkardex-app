<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Denominacion</th>
                        <th>unidad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicamentos as $medicamento)
                        <tr>
                            <td>{{ $medicamento->codigo }}</td>
                            <td>{{ $medicamento->denominacion }} {{ $medicamento->especificaciones }}</td>
                            <td>{{ $medicamento->unidad }}</td>
                            <td class="text-center" style="width: 120px">
                                <button type="button" class="btn btn-primary mt-1" wire:click="medicamento_edit({{ $medicamento->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                @if ($medicamento->visible == true)
                                    <button class="btn btn-warning mt-1" wire:click="change({{ $medicamento->id }})">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>    
                                @else
                                    <button class="btn btn-warning mt-1" wire:click="change({{ $medicamento->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>    
                                @endif
                                <x-Modal :id="'delete-' . $medicamento->id" title="Confirmar Accion" type="danger"
                                    icon="fas fa-trash-alt" route="administrador.medicamento.destroy"
                                    :parameter="$medicamento->id" method='DELETE'>
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
                            {{ $medicamentos->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>