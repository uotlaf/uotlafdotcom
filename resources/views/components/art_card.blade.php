@php use App\Models\Art;@endphp
<a href="/arts_{{App::currentLocale()}}/{{ $art->identifier }}"
   class="group relative rounded-lg overflow-hidden aspect-[4/3] items-end flex">
    @if ($art->suggestive)
        @include('components/image',
            ['class' => "absolute top-0 left-0 w-full h-full object-contain blur-2xl bg-black",
            'source' => $art->photo,
            'alt' => $art->name,
            'width_disc' => 1.2])
    @else
    @include('components/image',
        ['class' => "absolute top-0 left-0 w-full h-full object-contain",
        'source' => $art->photo,
        'alt' => $art->name,
        'width_disc' => 1.2])
    @endif
    <span
        class="flex w-full h-16 lg:h-10 group-hover:h-16 flex-col drop-shadow-2xl bg-zinc-900/70 backdrop-blur-sm px-2 py-2 transition-all">
        <span class="text-xl text-ellipsis truncate">
            {{ __("art.$art->identifier.title") }}
        </span>
{{--        <span--}}
{{--            class="opacity-0 collapse group-hover:visible group-hover:opacity-100 transition text-ellipsis truncate">--}}
{{--            {!! __("art.$art->identifier.description") !!}--}}
{{--        </span>--}}
        <span
            class="lg:opacity-0 lg:hidden group-hover:block group-hover:opacity-100 transition text-xs text-ellipsis truncate">
            {{__('default.posted_in')}}
            {{ $art->created_at->toDateString() }}
        </span>
    </span>
</a>
