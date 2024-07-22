@php
    use App\Models\Art;
    use App\Models\Article;
    if (!empty($article)) {
        $arc = Article::where('identifier', $article)->first();
    }
@endphp
    <!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta name="darkreader-lock">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="usable_area">
    <header>
        @include('components.banner')
    </header>
    @if ($enable_right_card)
    <div id="main_body" style="grid-template-columns: 1fr 4fr 1fr;">
    @else
    <div id="main_body" style="grid-template-columns: 1fr 5fr;">
    @endif
        @include('components.left_card')
        <section id="center">
            <div class="card_home">
                <div id="article_title_and_subtitle">
                <div id="article_title_div">
                    <div class="card_separator blue_separator"></div>
                    @if (!empty($article))
                        <a>{{ $arc['title'] }}</a>
                    @else
                        <a>{{ $title }}</a>
                    @endif
                    <div class="card_separator blue_separator"></div>
                </div>

{{--                @if (! empty($arc['subtitle']))--}}
{{--                    <div id="article_subtitle_div">--}}
{{--                        <a>{{ $arc['subtitle'] }}</a>--}}
{{--                        <div class="card_separator"></div>--}}
{{--                    </div>--}}
{{--                @endif--}}
                </div>
                @if (!empty($article))
                <article>
                    {!! $arc['content'] !!}
                </article>
                @else
                @include($view)
                @endif
            </div>
        </section>
        @if ( $enable_right_card )
            @include('components.right_card')
        @endif
    </div>
    <p class="footer_text">{{  __("default.footer_text") }}</p>
    <p class="footer_text">{{ __("default.phrase") }}</p>
</div>
</body>
</html>
