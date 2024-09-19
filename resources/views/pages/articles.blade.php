@php
    use App\Models\Article;
    use App\Models\ArticleTag;use Illuminate\Support\Facades\App;
    $arts = Article::where(
        [
            ['hide_from_posts', false],
            ['language', App::currentLocale()]
        ]
    )->orderBy("created_at", "desc")
    ->simplepaginate(Config('site.max_articles_per_page'));
@endphp
@extends('template')
@section('title', __('default.posts'))
@section('article_background')
    @include('components/image',
        ['class' => "h-full w-full object-cover grayscale",
        'source' => \App\Models\Theme::get('card_posts'),
        'alt' => 'Posts',
        'width_disc' => 1])
@endsection
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">
        @foreach($arts as $art)
            @include('components.article_card', ['article' => $art])
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
    <h2>{{__('default.per_tag')}}</h2>
    <ul class="flex space-x-2 justify-center flex-wrap">
        @foreach (ArticleTag::all() as $tag)
            <li>
                <a class="text-blue-600 dark:text-blue-500 hover:underline"
                   href={{route('articles_by_tag', ['language' => App::currentLocale(), 'identifier' => $tag->name])}}>
                    {{__("articletags.$tag->name") }}
                </a>
            </li>
        @endforeach
    </ul>
@stop
