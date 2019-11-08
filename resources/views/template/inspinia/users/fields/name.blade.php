<div class="form-group has-feedback @error('name') has-error @enderror">

    @component('template::components.label', ['for' => 'name'])
        {{ __('users.fields.name.label') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'name',
                    'name' => 'name',
                    'type' => 'text',
                    'placeholder' => __('users.fields.name.placeholder'),


                ])
        {{ isset($user->name) ? $user->name : request('name', old('name')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('users.fields.name.helper', ['length' => 2]) }}
    @endcomponent

    @error('name')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('name') }}
        @endcomponent
    @enderror

</div>