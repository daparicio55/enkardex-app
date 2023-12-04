<div class="input-group mb-2">
    <div class="input-group-prepend">
        {{ $start ?? '' }}
    </div>
        {{ $slot }}
    <div class="input-group-append">
        {{ $end ?? '' }}
    </div>
</div>