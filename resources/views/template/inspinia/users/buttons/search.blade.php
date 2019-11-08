@component('template::components.button',
          [
            'class' => $class ?? 'btn btn-primary btn-rounded btn-block', 'type' => 'submit',
            'tooltip' => __('users.tooltips.search')
          ])
    <i class="fa fa-search"></i>
    {{ __('users.buttons.search') }}
@endcomponent