<form method="{{ $method ?? 'get' }}" action="{{ $action ?? '' }}" name = "{{ $name ?? '' }}"
      role="form" >

{{--enctype='multipart/form-data'--}}
    {{ $slot }}
</form>