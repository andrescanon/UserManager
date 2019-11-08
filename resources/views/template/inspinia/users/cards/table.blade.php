@component('template::components.card', ['title' => __('users.cards.catalog.title')])

    @component('template::components.table', ['class' => 'table-bordered users-list'])

        <thead>
            <tr>
                <th>{{ __('users.columns.id') }}</th>
                <th>{{ __('users.columns.name') }}</th>
                <th>{{ __('users.columns.email') }}</th>
                <th>{{ __('users.columns.role') }}</th>
                <th>{{ __('users.columns.created_at') }}</th>
                <th>{{ __('users.columns.updated_at') }}</th>
                <th style="width: 120px">{{ __('users.columns.actions') }}</th>
            </tr>
        </thead>

    @endcomponent

@endcomponent

@push('body-scripts')

<script>
    $(function() {

      $('.users-list').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            paginate: true,
            ajax: '{{ route('api:datatables:users.index', request()->query()) }}',
            columns: [
                 { data: 'id', name: 'id', searchable: false, visible:false },
                 { data: 'name', name: 'name' },
                 { data: 'email', name: 'email', orderable: false },
                 { data: 'role', name: 'role' },
                 { data: 'created_at', name: 'created_at', searchable: false, visible:false },
                 { data: 'updated_at', name: 'updated_at', searchable: false, visible:false },
                 { data: 'actions', name: 'actions', orderable: false, searchable: false, type: "html" },
            ],
            lengthMenu: [
                [ 10, 50, 100, -1 ],
                [ '10 rows', '50 rows', '100 rows', 'Show all' ]
            ],
            dom: '<Bf<t>ip>',
            buttons: [
                {
                    text:      '<i class="fa fa-recycle"></i> {{ __('Reload') }}',
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
                    title: 'Users',
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
                {
                    text: '<i class="fa fa-user-plus"></i>',
                    titleAttr: 'invite',
                    action: function ( e, dt, node, config ) {
                        $('#invite').modal();
                    }
                }
            ],
        });
    });
</script>

@endpush
