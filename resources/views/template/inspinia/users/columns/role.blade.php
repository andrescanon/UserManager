
@component('template::components.helper', ['class' => $class ?? 'badge badge-primary'])
    {{ ucfirst($name) }}
@endcomponent