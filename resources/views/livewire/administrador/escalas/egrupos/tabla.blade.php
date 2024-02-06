@foreach ($escala->egrupos as $keyy => $egrupo)
    <tr>
        <td class="pt-2 pb-0"></td>
        <td class="pt-2 pb-0">
            {{ $key + 1 }}.{{ $keyy + 1 }}. {{ $egrupo->nombre }}
        </td>
        <td class="pt-1 pb-1">
            <button type="button" class="btn btn-info btn-sm" wire:click="egvalore_create({{ $egrupo->id }})">
                <i class="fas fa-plus-circle"></i>
            </button>
            <button type="button" class="btn btn-primary btn-sm" wire:click="egrupo_edit({{ $egrupo->id }})">
                <i class="fas fa-edit"></i>
            </button>
            <x-Modal :id="'delete-' . $escala->id . 'grupo-' . $egrupo->id" title="Confirmar Accion" type="danger btn-sm"
                icon="fas fa-trash-alt" route="administrador.egrupos.destroy"
                :parameter="$egrupo->id" method='DELETE'>
                <x-slot:body>
                    <p class="text-danger mb-0">¿Esta seguro que desea eliminar?</p>
                </x-slot:body>
            </x-Modal>
        </td>
    </tr>
    
    <tr>
        <td></td>
        <td colspan="2">
            <ul>
                @foreach ($egrupo->egvalores as $keyyy => $egvalore)
                    <li>
                        <span>
                            <button class="btn btn-primary btn-sm mb-1" wire:click="egvalore_edit({{ $egvalore->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <x-Modal :id="'delete-' . $escala->id . 'grupo-' . $egrupo->id . 'valores-' . $egvalore->id" title="Confirmar Accion" type="danger btn-sm mb-1"
                                icon="fas fa-trash-alt" route="administrador.egvalores.destroy"
                                :parameter="$egvalore->id" method='DELETE'>
                                <x-slot:body>
                                    <p class="text-danger mb-0">¿Esta seguro que desea eliminar?</p>
                                </x-slot:body>
                            </x-Modal>
                        </span>
                        <span>
                            <b>Nombre:</b> {{ $egvalore->nombre }} - <b>Valor:</b> {{ $egvalore->valor }}
                        </span>
                        
                    </li>    
                @endforeach
            </ul>
        </td>
    </tr>
    
@endforeach