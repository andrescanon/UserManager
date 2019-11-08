@component('template::components.button',
          [
            'class' => $class ?? 'btn btn-success btn-rounded btn-block edit-addresses-button', 'type' => 'submit',
            'tooltip' => __('tooltips.update')
          ])
    <i class="fa fa-save"></i>
    {{ __('buttons.update') }}
@endcomponent