@php
    use App\Models\Art;
    use App\Models\Artist;
    use App\Models\ArtTag;
    use App\Models\Persona;
    $arts = Art::orderBy("created_at", "desc")
    ->simplepaginate(Config('site.max_arts_per_page'));
@endphp
@extends('template')
@section('title', __('default.arts'))
@section('subtitle', __('default.latest_arts'))
@section('description')
    {{ __('default.recent_arts_description') }}
@endsection
@section('og:image')
    {{\App\Models\Theme::get('card_arts')}}.png
@endsection
@section('article_background')
    @include('components/image',
        ['class' => "h-full w-full object-cover",
        'source' => \App\Models\Theme::get('card_arts'),
        'alt' => 'Arts',
        'effects' => ['grayscale']])
@endsection
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
        @foreach($arts as $art)
            @include('components.art_card', ['art' => $art])
        @endforeach
    </div>

    <nav class="flex justify-center space-x-2 my-2">
        @if ($arts->currentPage() != 1)
            <a class="hover:border-sky-400 border-black transition border-solid border-2 rounded-xl px-2.5 py-1"
               href="{{ $arts->PreviousPageUrl() }}">
                « {{ $arts->currentPage() - 1 }}
            </a>
        @endif
        @if ($arts->hasMorePages())
            <a class="hover:border-sky-400 border-black transition border-solid border-2 rounded-xl px-2.5 py-1"
               href="{{ $arts->NextPageUrl() }}">
                {{ $arts->currentPage() + 1 }} »
            </a>
        @endif
    </nav>


    <h2>{{__('default.per_artist')}}</h2>
    <ul class="flex space-x-2 justify-center">
        @foreach (Artist::all() as $artist)
            <li>
                <a class="text-blue-600 dark:text-blue-500 hover:underline" href={{route('artist', ['language' => App::currentLocale(), 'identifier' => $artist->identifier])}}>
                    {{  $artist->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <h2>{{__('default.per_persona')}}</h2>
    <ul class="flex space-x-2 justify-center">
        @foreach (Persona::all() as $persona)
            <li>
                <a class="text-blue-600 dark:text-blue-500 hover:underline" href={{route('persona', ['language' => App::currentLocale(), 'identifier' => $persona->identifier])}}>
                    {{  $persona->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <h2>{{__('default.per_tag')}}</h2>
    <ul class="flex space-x-2 justify-center flex-wrap">
        @foreach (ArtTag::all() as $tag)
            <li>
                <a class="text-blue-600 dark:text-blue-500 hover:underline" href={{route('arts_by_tag', ['language' => App::currentLocale(), 'identifier' => $tag->name])}}>
                    {{ __("arttags.$tag->name") }}
                </a>
            </li>
        @endforeach
    </ul>
@stop
