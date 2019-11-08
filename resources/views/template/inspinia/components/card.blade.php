<div class="ibox {{ $class ?? '' }}">
    @isset($title)
        <div class="ibox-title">
            <h5>{{ $title }}</h5>
            <div class="ibox-tools">
                <a class="collapse-link" href="">
                    <i class="fa fa-chevron-up"></i>
                </a>

                @isset($dropdown_menu)
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    {!! $dropdown_menu !!}
{{--                    <ul class="dropdown-menu dropdown-user">--}}
{{--                        <li><a href="#" class="dropdown-item">Config option 1</a>--}}
{{--                        </li>--}}
{{--                        <li><a href="#" class="dropdown-item">Config option 2</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                @endisset
                @isset($close_link)
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                @endisset


            </div>
        </div>

    @endisset

    <div class="ibox-content">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="ibox-footer">
            {{ $footer }}
        </div>
    @endisset
</div>