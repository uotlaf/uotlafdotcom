<a href="{{route('article', ['language' => App::currentLocale(), 'identifier' => $art->identifier])}}"
   class="group relative rounded-lg overflow-hidden aspect-[4/3] items-end flex bg-black border-2 border-blue-900">
    @include('components/image',
    ['class' => "absolute top-0 left-0 w-full h-full object-cover",
    'source' => $article->banner,
    'alt' => $article->title,
    'width_disc' => 1.2])
    <span
        class="flex w-full h-20 lg:h-10 group-hover:h-20 flex-col drop-shadow-2xl bg-zinc-900/70 backdrop-blur-sm px-2 py-2 transition-all">
        <span class="text-xl text-ellipsis truncate">
            {{ $article->title }}
        </span>
        <span
            class="lg:opacity-0 lg:hidden group-hover:block group-hover:opacity-100 transition text-ellipsis truncate">
            {{ $article->subtitle }}
        </span>
        <span
            class="lg:opacity-0 lg:hidden group-hover:block group-hover:opacity-100 transition text-xs text-ellipsis truncate">
            {{__('default.posted_in')}}
            {{ $article->created_at->toDateString() }}
            {{ __('default.post_author') }}
            {{ $article->author }}
        </span>
    </span>
</a>
