<div class="form-group has-feedback @error('role') has-error @enderror">

    @component('template::components.label', ['for' => 'role'])
        {{ __('users.fields.role.label') }}
    @endcomponent

    @component('template::components.select2',
                [
                    'id' => 'role',
                    'name' => 'role',
                    'placeholder' => __('users.fields.role.placeholder'),
                    'multiple' => 'multiple'
                ])

		@if(!is_null(request('role')))
			@component('template::components.select_option',
					[
						'value' => request('role'),
						'selected' => 'selected'
					])
				{{ request('role') }}
			@endcomponent
		@endif

        @isset($selected)
            @component('template::components.select_option',
                    [
                        'value' => $selected->slug,
                        'selected' => 'selected'
                    ])
                {{ $selected->slug }}
            @endcomponent
        @endisset

        @isset($roles)
            @foreach($roles as $role)
                @component('template::components.select_option',
                        [
                            'value' => $role->slug,
                        ])
                    {{ $role->slug }}
                @endcomponent
            @endforeach
        @endisset


    @endcomponent

	@component('template::components.helper')
		{{ __('users.fields.role.helper') }}
	@endcomponent

    @error('role')
        @component('template::components.helper', ['class' => 'help-block'])
            {{ $errors->first('role') }}
        @endcomponent
    @enderror

</div>

@push('body-scripts')
    <script type="text/javascript">
        $(function(){
            $("#role").select2({
                maximumSelectionLength: 1,
                allowClear: true,
                ajax: {
                    url: '{{ json_api()->url()->index('roles') }}',
                    dataType: 'json',
                    type: "GET",
                    quietMillis: 5000,
                    data: function (params) {
                        //return search(params);
                    },
                    processResults: function (data) {
                        return format(data);
                    }
                }
            });

            function format(data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            id: item.attributes.slug,
                            text: item.attributes.name,
                            slug: item.attributes.slug,
                        }
                    })
                };
            }

            function search(params) {
                var query = {
                   search: params.term,
                   type: 'public'
                }

                //Query parameters will be ?search=[term]&type=public
                return query;
            }
        });
    </script>
@endpush