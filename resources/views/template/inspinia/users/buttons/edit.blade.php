@component('template::components.link',
          [
            'class' => $class ?? 'btn btn-primary btn-xs', 'action' => route('admin.users.edit', $user),
            'tooltip' => __('users.tooltips.edit'),
          ])
    <i class="fa fa-edit"></i>
    {{ $slot ?? '' }}
{{--    {{ __('users.buttons.edit') }}--}}
@endcomponent