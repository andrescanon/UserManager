<button class="btn {{ $class ?? 'btn' }}" type="{{ $type ?? 'button' }}" data-toggle="tooltip" title="{{ $tooltip ?? '' }}">
    {{ $slot }}
</button>