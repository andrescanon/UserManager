<div class="form-group has-feedback @error('country_code') has-error @enderror">

    @component('template::components.label', ['for' => 'country_code'])
        {{ __('addresses.labels.country_code') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'country_code',
                    'name' => 'country_code',
                    'type' => 'text',
                    'placeholder' => __('addresses.placeholders.country_code'),


                ])
        {{ isset($address->country_code) ? $address->country_code : request('country_code', old('country_code')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('addresses.helpers.country_code', ['length' => 2]) }}
    @endcomponent

    @error('first_name')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('country_code') }}
        @endcomponent
    @enderror

</div>