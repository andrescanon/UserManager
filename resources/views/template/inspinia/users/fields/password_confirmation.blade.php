<div class="form-group has-feedback @error('password_confirmation') has-error @enderror">


    @component('template::components.label', ['for' => 'password_confirmation'])
        {{ __('users.fields.password_confirmation.label') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'password_confirmation',
                    'name' => 'password_confirmation',
                    'type' => 'password',
                    'placeholder' => __('users.fields.password.placeholder'),

                ])
    @endcomponent

        @component('template::components.helper')
            {{ __('users.fields.password_confirmation.helper') }}
        @endcomponent

</div>