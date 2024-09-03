@php
    if (!isset($width_disc)) {
        $width_disc = 1;
    }
    if (!isset($id)) {
        $id = '';
    }
@endphp
<picture>
    @foreach (['avif', 'webp', 'png', 'jpg'] as $format)
        <source srcset="
        @foreach ([128, 256, 512, 768, 1024, 1536, 2048, 4096] as $resolution)
            {{ $source }}.{{$format}}?size={{$resolution}} {{$resolution * $width_disc}}w,
        @endforeach
        " type="image/{{$format}}">
    @endforeach
    <img id="{{$id}}" draggable="false" class="{{ $class }}" src="{{ $source }}.avif" sizes="100vw" alt="{{$alt}}">
</picture>
