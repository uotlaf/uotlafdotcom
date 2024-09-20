@php
    $arts = $tag->arts()->orderBy("created_at", "desc")->simplepaginate(Config('site.max_arts_per_page'));
@endphp
@extends('template')
@section('title', __('art.with_tag').__("arttags.$tag->name"))
@section('description')
    {{ __('default.recent_arts_description') }}
@endsection
@section('og:image')
    {{\App\Models\Theme::get('card_arts')}}.png
@endsection
@section('content')

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
@stop
