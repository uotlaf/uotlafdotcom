<li class="card overflow-hidden aspect-[281/35] md:aspect-[281/22] lg:aspect-[281/44] flex group">
    <a class="relative content-center w-full" href="{{ $link }}">
        @include('components.image', [
            'class' => "absolute top-0 left-1 w-full h-full group-hover:left-0 select-none
                        opacity-0 group-hover:opacity-100 object-cover transition-all",
            'source' => $background,
            'alt' => $alt,
            'width_disc' => $width_disc
])
        <span class="px-2.5 drop-shadow-2xl text-clip line-clamp-1 select-none"
              style="text-shadow: 2px 2px 2px black">{{ $text }}</span>
    </a>
</li>
