
@component('template::components.form', ['method' => 'post', 'name' => 'edit_form', 'action' => route('admin.users.update', $user)])

    @csrf
    @method('put')

    @include('template::users.fields.role', ['selected' => $user->role])
    @include('template::users.fields.name')
    @include('template::users.fields.email')
    @include('template::users.fields.password')
    @include('template::users.fields.password_confirmation')

    <div class="user-button">
        <div class="row">
            <div class="col-md-6">
                @include('template::users.buttons.update')
            </div>
            <div class="col-md-6">
                @component('template::users.buttons.delete', ['class' => 'btn btn-danger btn-rounded btn-block', 'user' => $user])
                        
                @endcomponent
            </div>
        </div>
    </div>

@endcomponent


@push('script')
    <script type="text/javascript">
        $(function() {
            $("form[name='edit_form']").validate({
                onkeyup: true,
                rules: {
                    role: {
                        required: true,
                    },
                    name: {
                        required: true,
                        minlength: 2,
                    },
                    email: {
                        required: true,
                        email:true,
                    },
                },
                messages: {
                    role: {
                        required: "required",
                    },
                    name: {
                        minlength: "At least 2 characters are necessary",
                        required: "required",
                    },
                    email: {
                        required: "required",
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endpush

