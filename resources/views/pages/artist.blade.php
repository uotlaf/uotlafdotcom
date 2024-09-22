@php
    $arts = $artist->arts()->orderBy("created_at", "desc")->simplepaginate(Config('site.max_arts_per_page'));
@endphp
@extends('template')
@section('title', $artist->name)
@section('description')
    {{ __('default.recent_arts_description') }}
@endsection
@section('og:image')
    {{\App\Models\Theme::get('card_arts')}}.png
@endsection
@section('article_background')
    @include('components.image', [
        'class' => "h-full w-full object-cover",
        'source' => $artist->banner,
        'alt' => $artist->name,
        'effects' => ['grayscale']])
@endsection
@section('content')
    <div class="z-10 relative">
        <div class="flex justify-center relative">
            <div class="grid grid-cols-1">
            @include('components.image', [
                'class' => "rounded-full w-64 border-white border-solid border-2",
                'source' => $artist->photo,
                'alt' => $artist->name,
                'width_disc' => 2
            ])
            <a class="link text-center" href="{{$artist->link}}">{{__('default.artist_url')}}</a>
            </div>
        </div>

        <h3 class="flex justify-center">{{__('default.latest_arts')}}</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">

            @foreach($arts as $art)
                @include('components.art_card', ['art' => $art])
            @endforeach
        </div>

        <nav class="flex justify-center space-x-2">
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
    </div>
@endsection
