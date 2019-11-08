<div class="form-group has-feedback @error('first_name') has-error @enderror">

    @component('template::components.label', ['for' => 'first_name'])
        {{ __('addresses.labels.name') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'first_name',
                    'name' => 'first_name',
                    'type' => 'text',
                    'placeholder' => __('addresses.placeholders.name'),


                ])
        {{ isset($address->first_name) ? $address->first_name : request('first_name', old('first_name')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('addresses.helpers.name', ['length' => 2]) }}
    @endcomponent

    @error('first_name')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('first_name') }}
        @endcomponent
    @enderror

</div>