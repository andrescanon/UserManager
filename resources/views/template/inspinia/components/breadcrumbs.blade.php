@if (count($breadcrumbs))
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $breadcrumbs->last()->title }}</h2>
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)

                    @if ($breadcrumb->url && !$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                    @endif

                @endforeach
            </ol>
        </div>
    </div>
@endif