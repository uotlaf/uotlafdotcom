@php use App\Models\Article;use Illuminate\Support\Facades\App; @endphp
@extends('template')
@section('title', __('default.posts'))
@section('content')
    @php
        $articles = Article::where([['hide_from_posts', false], ['language', App::currentLocale()]])->orderBy("created_at", "desc")->simplepaginate(Config('site.max_articles_per_page'));
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
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

    <br>

    <h2 class="flex justify-center space-x-2">
        {{__('default.per_tag')}}
    </h2>
    <ul class="flex space-x-2 justify-center flex-wrap">
        @foreach (\App\Models\ArticleTag::all() as $tag)
            <li>
                <a class="text-blue-600 dark:text-blue-500 hover:underline" href={{"/articles_".App::currentLocale()."/tag/".$tag->name}}>
                    {{__("articletags.$tag->name") }}
                </a>
            </li>
        @endforeach
    </ul>
@stop
