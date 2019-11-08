<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script type="text/javascript"  src="{{ asset('js/app.js') }}" ></script>
    <script type="text/javascript"  src="{{ asset('js/inspinia.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/metisMenu/jquery.metisMenu.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inspinia.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    @stack('style')
    @yield('style')

</head>
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

    @stack('script')

</body>

</html>