<div
    id="{{ $id ?? 'carousel' }}"
    class="carousel slide {{ $class ?? '' }}"
    data-ride="carousel"
>
    @if($indicators)
        <ol class="carousel-indicators">
            @isset($items)
                @foreach($items as $item)
                    <li data-target="#{{ $id ?? 'carousel' }}" data-slide-to="{{ $loop->index }}"></li>
                @endforeach
            @else
                {!! $indicators !!}
            @endisset
        </ol>
    @endif

    <div class="carousel-inner" role="listbox">
        @isset($items)
            @foreach($items as $item)
                <div class="carousel-item @istrue($loop->first, 'active')">
                    <img alt='{{ $item['alt'] ?? 'image' }}' class="{{ $item['class'] ?? 'img-responsive' }}" src="{{ $item['src'] }}">
                </div>
            @endforeach
        @endisset

        {{ $slot }}
    </div>

    @if($controls)
        <a class="carousel-control-prev" href="#{{ $id ?? 'carousel' }}" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#{{ $id ?? 'carousel' }}" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    @endif
</div>
