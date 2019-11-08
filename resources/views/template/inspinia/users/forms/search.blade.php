
@component('template::components.form', ['method' => 'get', 'name' => 'search_form', 'action' => request()->url()])

    @include('template::users.fields.role')
    @include('template::users.fields.name')
    @include('template::users.fields.email')
    @include('template::users.buttons.search')

@endcomponent


@push('script')
    <script type="text/javascript">
        $(function() {
            $("form[name='search_form']").validate({
                onkeyup: true,
                rules: {
                    name: {
                        minlength: 2,
                    },
                    email: {
                        minlength: 2,
                    },
                },
                messages: {
                    name: {
                        minlength: "At least 2 characters are necessary",
                    },
                    email: {
                        minlength: "At least 2 characters are necessary",
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush

