<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DNI</th>
                        <th>APELLIDOS, Nombres</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Historia</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pacientes as $key => $paciente)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $paciente->numeroDocumento }}</td>
                            <td>{{ Str::upper($paciente->apellidoPaterno) }} {{ Str::upper($paciente->apellidoMaterno) }}, {{ Str::title($paciente->nombres) }}</td>
                            <td>{{ $paciente->sexo }}</td>
                            <td>{{ $paciente->edad }}</td>
                            <td>{{ $paciente->historia }}</td>
                            <td class="text-center" style="width: 120px">
                                <button type="button" class="btn btn-primary mt-1" wire:click="edit_paciente({{ $paciente->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                {{-- @if ($medicamento->visible == true)
                                    <button class="btn btn-warning mt-1" wire:click="change({{ $medicamento->id }})">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>    
                                @else
                                    <button class="btn btn-warning mt-1" wire:click="change({{ $medicamento->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>    
                                @endif --}}
                                <x-Modal :id="'delete-' . $paciente->id" title="Confirmar Accion" type="danger"
                                    icon="fas fa-trash-alt" route="licenciados.pacientes.destroy"
                                    :parameter="$paciente->id" method='DELETE'>
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
                        <td colspan="7">
                            {{ $pacientes->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>