@component('template::components.button',
          [
            'class' => $class ?? 'btn btn-success btn-rounded btn-block', 'type' => 'submit',
            'tooltip' => __('users.tooltips.update')
          ])
    <i class="fa fa-save"></i>
    {{ __('users.buttons.update') }}
@endcomponent