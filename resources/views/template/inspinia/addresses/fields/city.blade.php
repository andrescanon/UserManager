<div class="form-group has-feedback @error('city') has-error @enderror">

    @component('template::components.label', ['for' => 'city'])
        {{ __('addresses.labels.city') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'city',
                    'name' => 'city',
                    'type' => 'text',
                    'placeholder' => __('addresses.placeholders.city'),


                ])
        {{ isset($address->city) ? $address->city : request('city', old('city')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('addresses.helpers.city', ['length' => 2]) }}
    @endcomponent

    @error('city')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('city') }}
        @endcomponent
    @enderror

</div>