<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
   {{--  @php
        $vias = ['VO'=>'VO','EV'=>'EV'];
    @endphp --}}
    {!! Form::label('via_id', 'Via', [null]) !!}
    {!! Form::select('via_id', $vias, null, ['class'=>'form-control']) !!}
</div>

