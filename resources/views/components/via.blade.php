<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @php
        $vias = ['VO'=>'VO','EV'=>'EV'];
    @endphp
    {!! Form::select('via', $vias, null, ['class'=>'form-control']) !!}
</div>

