
<form action="{{ route('admin.users.destroy', $user) }}" method="post">
    @csrf
    @method('delete')
    @component('template::components.button',
          [
            'type' => 'submit',
            'class' => $class ?? 'btn btn-danger btn-xs',
            'tooltip' => __('users.tooltips.delete'),
          ])
        <i class="fa fa-trash"></i>
            {{ __('users.buttons.delete') }}
    @endcomponent
</form>