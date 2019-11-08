<!-- https://select2.org/ -->

<select class="{{ $class ?? 'form-control select2' }}" name="{{ $name ?? '' }}"
        id="{{ $id ?? '' }}" {{ $multiple ?? '' }}
        data-tags="{{ $data_tags ?? false }}" data-allow-clear="{{ $data_allow_clear ?? false }}"
        data-placeholder="{{ $placeholder ?? '' }}" >

    {{ $slot }}

</select>


@push('script')
    <script type="text/javascript">
        $(function(){
            $('.select2').select2({
                allowClear: true,
                //  placeholder: "Select ",
            });
        });
    </script>
@endpush