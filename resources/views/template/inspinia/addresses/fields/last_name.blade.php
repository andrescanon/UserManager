<div class="form-group has-feedback @error('last_name') has-error @enderror">

    @component('template::components.label', ['for' => 'last_name'])
        {{ __('addresses.labels.name') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'last_name',
                    'name' => 'last_name',
                    'type' => 'text',
                    'placeholder' => __('addresses.placeholders.name'),


                ])
        {{ isset($address->last_name) ? $address->last_name : request('last_name', old('last_name')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('addresses.helpers.name', ['length' => 2]) }}
    @endcomponent

    @error('last_name')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('last_name') }}
        @endcomponent
    @enderror

</div>