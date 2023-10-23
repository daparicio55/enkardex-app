    <!-- Modal -->
    <div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}" aria-hidden="true">
        {!! Form::open(['route'=>[$route,$parameter],'method'=>'delete']) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-{{ $type }}">
                    <h5 class="modal-title" id="{{ $id }}"><i class="{{ $icon }}"></i> {{ $title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   {{ $body }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="far fa-times-circle"></i> Cerrar
                    </button>
                    <button type="submit" class="btn btn-{{ $type }}">
                        <i class="far fa-check-circle"></i> Aceptar
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-{{ $type }}" data-toggle="modal" data-target="#{{ $id }}">
        <i class="{{ $icon }}"></i>
    </button>


