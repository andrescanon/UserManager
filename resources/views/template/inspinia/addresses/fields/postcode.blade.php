<div class="form-group has-feedback @error('postcode') has-error @enderror">

    @component('template::components.label', ['for' => 'postcode'])
        {{ __('addresses.labels.postcode') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'postcode',
                    'name' => 'postcode',
                    'type' => 'text',
                    'placeholder' => __('addresses.placeholders.postcode'),


                ])
        {{ isset($address->postcode) ? $address->postcode : request('postcode', old('postcode')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('addresses.helpers.postcode', ['length' => 2]) }}
    @endcomponent

    @error('first_name')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('postcode') }}
        @endcomponent
    @enderror

</div>