<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
<label for="{{ $name }}">{{ $label }}</label>
<div class="input-group">
    @isset($pre)
        <div class="input-group-prepend">
            {{ $pre }}
        </div>    
    @endisset
    <input type="date" class="form-control" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}">
    @isset($end)
        <div class="input-group-append">
            {{ $end }}
            {{-- <span class="input-group-text">
                .00
            </span> --}}
        </div>    
    @endisset
</div>
