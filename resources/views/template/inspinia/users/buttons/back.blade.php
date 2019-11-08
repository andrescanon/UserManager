@component('template::components.link',
          [
            'class' => $class ?? 'btn btn-primary btn-rounded btn-block', 'action' => route('admin.users.index'),
            'tooltip' => __('users.tooltips.edit'),
          ])
    <i class="fas fa-fw fa-reply-all" aria-hidden="true"></i>
    {{ __('users.buttons.back') }}
@endcomponent