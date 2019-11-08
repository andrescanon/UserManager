@component('template::components.link',
          [
            'class' => $class ?? 'btn btn-info  btn-xs', 'action' => route('admin.users.show', $user),
            'tooltip' => __('users.tooltips.show'),
          ])
    <i class="fa fa-eye"></i>
{{--    {{ __('users.buttons.show') }}--}}
@endcomponent