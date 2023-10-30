<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @php
        $vias = ['VO'=>'VO','EV'=>'EV'];
    @endphp
    {!! Form::label('via', 'Via', [null]) !!}
    {!! Form::select('via', $vias, null, ['class'=>'form-control']) !!}
</div>

