@php
    if (!isset($id)) {
        $id = '';
    }
    if (!isset($class)) {
        $class = '';
    }
@endphp
<picture>
    @foreach (['avif', 'webp', 'png', 'jpg'] as $format)
        <source srcset="
            {{ $source }}.{{$format}},
        " type="image/{{$format}}">
    @endforeach
    <img id="{{$id}}" draggable="false" class="{{ $class }}" src="{{ $source }}.png" alt="{{$alt}}">
</picture>
