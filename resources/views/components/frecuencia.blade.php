<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
    @php
        $frecuencias = [
            'C-1h'=>'C-1h',
            'C-2h'=>'C-2h',
            'C-3h'=>'C-3h',
            'C-4h'=>'C-4h',
            'C-5h'=>'C-5h',
            'C-6h'=>'C-6h',
            'C-7h'=>'C-7h',
            'C-8h'=>'C-8h',
            'C-9h'=>'C-9h',
            'C-10h'=>'C-10h',
            'C-11h'=>'C-11h',
            'C-12h'=>'C-12h',
            'C-13h'=>'C-13h',
            'C-14h'=>'C-14h',
            'C-15h'=>'C-15h',
            'C-16h'=>'C-16h',
            'C-17h'=>'C-17h',
            'C-18h'=>'C-18h',
            'C-19h'=>'C-19h',
            'C-20h'=>'C-20h',
            'C-21h'=>'C-21h',
            'C-22h'=>'C-22h',
            'C-23h'=>'C-23h',
            'C-24h'=>'C-24h',
        ];
    @endphp
    {!! Form::select('frecuencia', $frecuencias, null, ['class'=>'form-control']) !!}
</div>