<input id="{{ $id ?? '' }}" class="{{ $class ?? 'form-control' }}"
       placeholder="{{ $placeholder ?? '' }}"
       name="{{ $name ?? '' }}" value="{{ $slot }}"
       type="{{ $type ?? 'text' }}" {{ $required ?? '' }} {{ $attributes ?? '' }}>
