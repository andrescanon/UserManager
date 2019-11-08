@extends('template::layouts.default')

@section('title', 'Landing Page')

@section('body')
<body id="page-top" class="landing-page no-skin-config">

    @include('template::landing.components.navbar')

    @yield('content')

    <script type="text/javascript" src="{{ asset('plugins/pace/pace.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('plugins/wow/wow.min.js') }}" ></script>

    <script type="text/javascript">

        $(document).ready(function () {

            //	$(header).removeClass('navbar-scroll')

            $('body').scrollspy({
                target: '#navbar',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
            function init() {
                window.addEventListener( 'scroll', function( event ) {
                    if( !didScroll ) {
                        didScroll = true;
                        setTimeout( scrollPage, 250 );
                    }
                }, false );
            }
            function scrollPage() {
                var sy = scrollY();
                if ( sy >= changeHeaderOn ) {
                    $(header).addClass('navbar-scroll')
                }
                else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }
            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();
    </script>

    @stack('body-scripts')

</body>
@endsection