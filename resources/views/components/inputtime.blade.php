<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<label for="{{ $name }}" class="{{ $class }}">{{ $label }}</label>
<div class="input-group">
    @isset($pre)
        <div class="input-group-prepend">
            {{ $pre }}
        </div>
    @endisset
    <input type="time" class="form-control" name="{{ $name }}" id="{{ $id }}"
        value="{{ $value }}">
    @isset($end)
        <div class="input-group-append">
            {{ $end }}
        </div>
    @endisset
</div>
