@component('template::components.card', ['title' => __('addresses.cards.table.title')])


    @component('template::components.table', ['class' => 'table-bordered addresses-list'])

        <thead>
        <tr>
            <th>{{ __('addresses.columns.id') }}</th>
            <th>{{ __('addresses.columns.first_name') }}</th>
            <th>{{ __('addresses.columns.last_name') }}</th>
            <th>{{ __('addresses.columns.company') }}</th>
            <th>{{ __('addresses.columns.country_code') }}</th>
            <th>{{ __('addresses.columns.city') }}</th>
            <th>{{ __('addresses.columns.postcode') }}</th>
            <th>{{ __('addresses.columns.label') }}</th>
            <th>{{ __('addresses.columns.is_primary') }}</th>
            <th>{{ __('addresses.columns.is_billing') }}</th>
            <th>{{ __('addresses.columns.is_shipping') }}</th>
            <th>{{ __('addresses.columns.updated_at') }}</th>
            <th>{{ __('addresses.columns.created_at') }}</th>
        </tr>
        </thead>

    @endcomponent

    <div class="modal inmodal" id="create_address" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-user-circle modal-icon"></i>
                    <h4 class="modal-title">{{ __('Create New Address') }}</h4>

                </div>

                @component('template::components.form', ['method' => 'post', 'name' => 'create_address_form', 'action' =>  json_api()->url()->create('addresses')])

                    <div class="modal-body">

                        @csrf

                        @include('template::addresses.fields.first_name')
                        @include('template::addresses.fields.last_name')
                        @include('template::addresses.fields.company')
                        @include('template::addresses.fields.country_code')
                        @include('template::addresses.fields.city')
                        @include('template::addresses.fields.postcode')

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-white" data-dismiss="modal">
                            <i class="fa fa-close"></i> {{ __('Close') }}
                        </button>
                        @include('template::addresses.buttons.update')
                    </div>

                @endcomponent

            </div>
        </div>
    </div>

@endcomponent

@push('body-scripts')

    <script>

        $(function() {

            var addressesList = $('.addresses-list').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    paginate: true,
                    ajax: '{{ route('api:datatables:addresses.index', compact('entity')) }}',
                    columns: [
                        { data: 'id', name: 'id', searchable: false, visible:false, orderable:false },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'last_name', name: 'last_name' },
                        { data: 'company', name: 'company' },
                        { data: 'country_code', name: 'country_code' },
                        { data: 'city', name: 'city' },
                        { data: 'postcode', name: 'postcode' },
                        { data: 'label', name: 'label', searchable: false, visible:false, orderable:false },
                        { data: 'is_primary', name: 'is_primary', searchable: false, visible:false, orderable:false },
                        { data: 'is_billing', name: 'is_billing', searchable: false, visible:false, orderable:false },
                        { data: 'is_shipping', name: 'is_shipping', searchable: false, visible:false, orderable:false },
                        { data: 'created_at', name: 'created_at', searchable: false, visible:false },
                        { data: 'updated_at', name: 'updated_at', searchable: false, visible:false },
                    ],

                    lengthMenu: [
                            [ 10, 50, 100, -1 ],
                        [ '10 rows', '50 rows', '100 rows', 'Show all' ]
                    ],
                    dom: '<Bf<t>ip>',
                    buttons: [
                        {
                            text: '<i class="fa fa-plus"></i> {{ __('Create') }}',
                            titleAttr: 'add',
                            action: function ( e, dt, node, config ) {
                                $('#create_address').modal();
                            }
                        },
                        {
                            text:      '<i class="fa fa-recycle"></i> Reload table',
                            titleAttr: '{{ __('Reload table') }}',
                            action: function ( e, dt, button, config ) {
                                dt.ajax.reload();
                            },
                        },
                        {
                            extend: 'pageLength',
                        },
                        {
                            extend:    'copyHtml5',
                            text:      '<i class="fa fa-files-o"></i>',
                            titleAttr: '{{ __('datatable.buttons.copy') }}'
                        },
                        {
                            extend:    'csvHtml5',
                            text:      '<i class="fa fa-file-csv"></i>',
                            titleAttr: '{{ __('datatable.buttons.csv') }}'
                        },
                        {
                            extend:    'excelHtml5',
                            text:      '<i class="fa fa-file-excel-o"></i>',

                            titleAttr: '{{ __('datatable.buttons.excel') }}'
                        },
                        {
                            extend:    'pdfHtml5',
                            text:      '<i class="fa fa-file-pdf-o"></i>',
                            titleAttr: '{{ __('datatable.buttons.pdf') }}',
                            title: 'Addresses',
                        },
                        {
                            extend:    'print',
                            text:      '<i class="fa fa-print"></i>',
                            titleAttr: '{{ __('datatable.buttons.print') }}',
                        },
                        {
                            extend:    'colvis',
                            text:      '<i class="fa fa-eye"></i>',
                            titleAttr: '{{ __('datatable.buttons.colvis') }}',
                        },

                    ],
                }
            );

            // addressesList.button().add( 0,
            //     {
            //         action: function ( e, dt, button, config ) {
            //             dt.ajax.reload();
            //         },
            //         text: '<i class="fa fa-recycle"></i> Reload table'
            //     }
            // );
            //
            // addressesList.button().add( 0,
            //     {
            //         text: '<i class="fa fa-edit"></i> Edit',
            //         titleAttr: 'add',
            //         action: function ( e, dt, node, config ) {
            //             $('#add_address').modal();
            //         }
            //     }
            // );

            var form = $("form[name='create_address_form']");

            form.validate({
                onkeyup: true,
                rules: {
                    first_name: {
                        required: true,
                        minlength: 2,
                    },
                    last_name: {
                        required: true,
                        minlength: 2,
                    },
                    company: {
                        required: false,
                        minlength: 2,
                    },
                    country_code: {
                        required: false,
                        minlength: 2,
                        maxlength: 2,
                    },
                    postcode: {
                        required: false,
                        minlength: 2,
                    },
                    city: {
                        required: false,
                        minlength: 2,
                    },

                },
            });

            form.submit(function(event){

                event.preventDefault();


               // var url = "{{ json_api()->url()->create('addresses') }}";
               // var request_method = $(this).attr("method");
                var form_data = JSON.stringify(
                    {
                        "data": {

                            "type": "addresses",
                            "attributes": {
                                "first_name": $("input[name='first_name']").val(),
                                "last_name": $("input[name='last_name']").val(),
                                "company": $("input[name='company']").val(),
                                "country_code": $("input[name='country_code']").val(),
                                "postcode": $("input[name='postcode']").val(),
                                "city": $("input[name='city']").val(),
                            },

                            "relationships": {
                                "addressable": {
                                    "data": {
                                        "type": "{{ $entity->getResourceType() }}",
                                      //  "id": "{{ $entity->getKey() }}"
                                    }
                                }
                            }

                        }
                    }
                );

                var headers = {
                    "Accept": 'application/vnd.api+json',
                    "Content-Type": 'application/vnd.api+json',
                };

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "progressBar": true,
                    "preventDuplicates": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "400",
                    "hideDuration": "1000",
                    "timeOut": "7000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                $.ajax({
                    data : form_data,
                    url : "{{ json_api()->url()->create('addresses') }}",
                    method: $(this).attr("method"),
                    headers: headers,
                    dataType: "json",
                    success: function(response) {
                       // console.log('success', response);
                        $('#create_address').modal('hide');
                        toastr.info('{!! __('New Address was added') !!}');
                        addressesList.ajax.reload();
                    },
                    error: function(error) {
                       // console.log('error', error);

                        toastr.warning(error.statusText);

                    }
                });

            });

        });


    </script>

@endpush
