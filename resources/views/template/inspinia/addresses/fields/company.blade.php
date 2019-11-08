<div class="form-group has-feedback @error('company') has-error @enderror">

    @component('template::components.label', ['for' => 'company'])
        {{ __('addresses.labels.company') }}
    @endcomponent

    @component('template::components.input',
                [
                    'id' => 'company',
                    'name' => 'company',
                    'type' => 'text',
                    'placeholder' => __('addresses.placeholders.company'),


                ])
        {{ isset($address->company) ? $address->company : request('company', old('company')) }}
    @endcomponent

    @component('template::components.helper')
        {{ __('addresses.helpers.company', ['length' => 2]) }}
    @endcomponent

    @error('first_name')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('company') }}
        @endcomponent
    @enderror

</div>