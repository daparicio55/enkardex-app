<x-Modal id="addday-{{ $kardex->id }}" title="Agregar un dia de atencion" type="primary" icon="fas fa-calendar-day"
    route="licenciados.kardexes.dias.store" parameter=null method='POST'>
    <x-slot:body>
        <div class="row">
            <input type="hidden" name="kardex" value="{{ $kardex->id }}">
            <input type="hidden" name="local" value="{{ $locate }}">
            <div class="col-sm-12 col-md-6">
                {!! Form::label('dias', 'Dias creados', [null]) !!}
                <ol>
                    @foreach ($kardex->dias as $dia)
                        <li>{{ date('d-m-Y', strtotime($dia->fecha)) }}</li>
                    @endforeach
                </ol>
            </div>
            <div class="col-sm-12 col-md-6">
                {!! Form::label('add', 'Agregar días', [null]) !!}
                <select name="add" id="add" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
    </x-slot:body>
    <x-slot:textbutton>
    </x-slot:textbutton>
</x-Modal>
