<div class="modal inmodal" id="edit_addresses" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInRight">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<i class="fa fa-user-circle modal-icon"></i>
				<h4 class="modal-title">{{ __('Entsdasdadsdgdg dfg dfrg er gter') }}</h4>

			</div>

			@component('components.form', ['method' => 'post','name' => 'addresses_edit_form', 'action' =>  json_api('datatables')->url()->create('addresses')])

				<div class="modal-body">

					@csrf

					@include('admin.addresses.fields.given_name')
					@include('admin.addresses.fields.family_name')

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-white" data-dismiss="modal">
						<i class="fa fa-close"></i> {{ __('Close') }}
					</button>
					@include('admin.addresses.buttons.update')
				</div>

			@endcomponent

		</div>
	</div>
</div>
