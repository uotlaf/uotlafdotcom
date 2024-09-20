@php
    use Illuminate\Support\Facades\App;$articles = $tag->articles()->where([['hide_from_posts', false], ['language', App::currentLocale()]])->orderBy("created_at", "desc")->simplepaginate(Config('site.max_arts_per_page'));
@endphp
@extends('template')
@section('title', __('articles.with_tag').__('articletags.'.$tag->name))
@section('description')
    {{ __('default.recent_posts_description') }}
@endsection
@section('og:image')
    {{\App\Models\Theme::get('card_posts')}}.png
@endsection
@section('content')

    <div class="grid grid-cols-2 gap-4 w-full">
        @foreach($articles as $article)
            @include('components.article_card', ['article' => $article])
        @endforeach
    </div>


    <nav class="flex justify-center space-x-2">
        @if ($articles->currentPage() != 1)
            <a class="hover:border-sky-400 border-black transition border-solid border-2 rounded-xl px-2.5 py-1"
               href="{{ $articles->PreviousPageUrl() }}">
                « {{ $articles->currentPage() - 1 }}
            </a>
        @endif
        @if ($articles->hasMorePages())
            <a class="hover:border-sky-400 border-black transition border-solid border-2 rounded-xl px-2.5 py-1"
               href="{{ $articles->NextPageUrl() }}">
                {{ $articles->currentPage() + 1 }} »
            </a>
        @endif
    </nav>
@stop
