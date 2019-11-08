<div class="form-group has-feedback @error('email') has-error @enderror">

    @component('template::components.label', ['for' => 'email'])
        {{ __('users.fields.email.label') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'email',
                    'name' => 'email',
                    'type' => request()->is('users.create') ?? 'email',
                    'placeholder' => __('example@example.com')
                ])
        {{ isset($user->email) ? $user->email : request('email', old('email')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('users.fields.name.helper', ['length' => 2]) }}
    @endcomponent

    @error('email')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('email') }}
        @endcomponent
    @enderror

</div>