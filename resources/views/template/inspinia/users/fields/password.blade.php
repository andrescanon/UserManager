<div class="form-group has-feedback @error('password') has-error @enderror">


    @component('template::components.label', ['for' => 'password'])
        {{ __('users.fields.password.label') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'password',
                    'name' => 'password',
                    'type' => 'password',
                    'placeholder' => __('users.fields.password.placeholder'),

                ])
    @endcomponent

        @component('template::components.helper')
            {{ __('users.fields.password.helper') }}
        @endcomponent

        @error('password')
            @component('template::components.helper', ['class' => 'help-block'])
                {{ $errors->first('password') }}
            @endcomponent
        @enderror



</div>