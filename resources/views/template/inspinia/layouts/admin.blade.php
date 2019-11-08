@extends('template::layouts.default')

@section('title', 'Admin Panel')

@push('head-styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('plugins/datatables/datatables.js') }}"></script>
    <link href="{{ asset('plugins/datatables/datatables.css') }}" rel="stylesheet" />



@endpush

@section('body')
<body>
    <div id="app">

        @include('template::components.left-sidebar')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                @include('template::components.navbar')
            </div>

            {{--            {{ Breadcrumbs::render() }}--}}

            <div class="wrapper wrapper-content">
                @include('template::components.message')
                @yield('content')
            </div>

            @include('template::components.footer')

        </div>

        @include('template::components.right-sidebar')

    </div>

    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>

    @stack('body-scripts')
    @yield('body-scripts')

</body>
@endsection