@php
    if (!isset($id)) {
        $id = '';
    }
    if (!isset($class)) {
        $class = '';
    }
    if (!isset($effects)) {
        $effects = "";
    } else {
        $effects = "effects=" . implode(',', $effects);
    }
@endphp
<picture>
    @foreach (['avif', 'webp', 'png', 'jpg'] as $format)
        <source srcset="
            {{ $source }}.{{$format}}?{{ $effects }}" type="image/{{$format}}">
    @endforeach
    <img id="{{$id}}" draggable="false" class="{{ $class }}" src="{{ $source }}.png?{{ $effects }}" alt="{{$alt}}">
</picture>
