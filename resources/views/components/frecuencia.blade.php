<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    @php
        $frecuencias = [
            '1'=>'C-1h',
            '2'=>'C-2h',
            '3'=>'C-3h',
            '4'=>'C-4h',
            '5'=>'C-5h',
            '6'=>'C-6h',
            '7'=>'C-7h',
            '8'=>'C-8h',
            '9'=>'C-9h',
            '10'=>'C-10h',
            '11'=>'C-11h',
            '12'=>'C-12h',
            '13'=>'C-13h',
            '14'=>'C-14h',
            '15'=>'C-15h',
            '16'=>'C-16h',
            '17'=>'C-17h',
            '18'=>'C-18h',
            '19'=>'C-19h',
            '20'=>'C-20h',
            '21'=>'C-21h',
            '22'=>'C-22h',
            '23'=>'C-23h',
            '24'=>'C-24h',
        ];
    @endphp
    {!! Form::label('frecuencia', 'Frecuencia', [null]) !!}
    {!! Form::select('frecuencia', $frecuencias, null, ['class'=>'form-control']) !!}
</div>