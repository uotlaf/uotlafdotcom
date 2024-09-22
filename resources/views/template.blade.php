@php
    use App\Models\Art;
    use App\Models\Theme;
    use Illuminate\Support\Facades\App;
    // Default locale config
    $other_locale = 'pt';
    if (App::currentLocale() == 'pt') {
        $other_locale = 'en';
    }
@endphp
    <!DOCTYPE html>
<html lang="{{ app()->currentLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="darkreader-lock">
    <meta name="language" content="{{App::currentLocale()}}"/>
    <title>
        @hasSection("window_title")    @yield("window_title")
        @else                          @yield("title")
        @endif
    </title>
    @include('components.meta')
    @vite('resources/css/app.css')
    @include('feed::links')
</head>
<body class="lg:px-20 xl:px-40 relative grid grid-cols-6 text-white bg-black gap-4">
@include('backgrounds.stars')

{{-- Banner --}}
<header
    class="rounded-lg overflow-hidden aspect-[4/1] md:aspect-[6/1] lg:aspect-[8/1] col-span-6 select-none flex flex-row">
    @include('components.banner')
</header>
{{--  Left card  --}}
<section id="left_nav" class="bg-red select-none col-span-6 lg:col-span-1 hidden lg:block w-0 lg:w-full transition-all">
    @foreach ([
            __('default.navigation') => [
                ['text' => __('default.home'), 'link' => route("home", App::currentLocale()), 'background' => Theme::get('card_home')],
                ['text' => __('default.posts'), 'link' => route('all_articles', App::currentLocale()), 'background' => Theme::get('card_posts')],
                ['text' => __('default.arts'), 'link' => route('all_arts', App::currentLocale()), 'background' => Theme::get('card_arts')],
                ['text' => __('default.about'), 'link' => route('about', App::currentLocale()), 'background' => Theme::get('card_about')],
                ['text' => __('default.change_locale'), 'link' => route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['language' => $other_locale])), 'background' => Theme::get('card_3ds')],
            ],
//                __('default.projects') => [
//                    ['text' => __('projects.1'), 'link' => '/', 'background' => Theme::get('twitter_bg')]
//                ],
            __('default.nerd_things') => [
                ['text' => __('default.gpg_key'), 'link' => '/uotlaf.gpg', 'background' => Theme::get('card_gpg')],
                ['text' => __('default.rss_feed'), 'link' => route('article', ['language' => App::currentLocale(), 'identifier' => 'rss']), 'background' => Theme::get('card_rss')],
                ],
//                __('default.other_versions') => [
//                    ['text' => __('versions.3ds'), 'link' => '/', 'background' => Theme::get('card_3ds')]
//                ],
            __('default.webring') => [
                ['text' => "inky1003", 'link' => 'https://inky1003.com/', 'background' => Theme::get('card_default')]
            ],
            ] as $name => $cards)
        <nav
            class="md:grid border-2 border-blue-400 rounded-xl mb-4 grid grid-cols-subgrid overflow-hidden bg-black">
            <h2 class="text-center text-sky-400 aspect-[281/35] md:aspect-[281/22] lg:aspect-[281/44] content-center border-b-2 border-zinc-900">
                {{ $name }}
            </h2>
            {{--                <span class="bg-zinc-900 py-px mx-0.5"></span>--}}
            <ul>
                @foreach ( $cards as $card)
                    @include('components.card', ['text' => $card['text'], 'link' => $card['link'], 'background' => $card['background'], 'alt' => "", 'width_disc' => 1])
                @endforeach
            </ul>
        </nav>
    @endforeach
</section>
<main id="center"
         class="col-span-6 lg:col-span-4 border-2 border-blue-400 rounded-xl grid overflow-hidden bg-black flex-1 py-5 px-5 relative">
    {{-- Article Background --}}
    @hasSection('article_background')
        <div class="absolute top-0 left-0 h-full w-full opacity-10 select-none">
            @yield("article_background")
        </div>
    @endif
    {{-- Firefox reader mode customization --}}
    @hasSection('article')
        <article class="text-center justify-center h-full w-full z-10 relative text-justify text-slate-200">
            @else
                <div class="text-center justify-center h-full w-full z-10 relative">
                    @endif
                    <div class="flex justify-center mb-2">
                        <h1 class="text-4xl font-bold before:bg-blue-500 before:h-0.5 after:bg-blue-500 after:h-0.5 grid">@yield("title")</h1>
                    </div>
                    @hasSection('subtitle')
                        <h3 class="text-center">@yield('subtitle')</h3>
                    @endif
                    @isset($article)
                        @sectionMissing('hide_timestamp')
                        <h3 class="text-sm text-center">
                            {{ $article->updated_at->format(__('articles.dateFormat')) }}
                            , {{__('articles.by')}} {{ $article->author }}
                        </h3>
                        @endif
            @endisset
            @yield('article')
            @yield('content')
            @hasSection('article')
        </article>
        @else
            </div>
    @endif
</main>
<section id="right_nav"
         class="bg-blue select-none col-span-6 lg:col-span-1 hidden lg:block w-0 lg:w-full transition-all">
    {{--     Cube      --}}
    <section class="border-2 border-blue-400 rounded-xl mb-4 grid-cols-subgrid overflow-hidden bg-black lg:grid">
        <div id="3d_object"
             class="relative aspect-[4/1] lg:aspect-square content-center grid justify-center cursor-rotate">
            @hasSection("css_rotate_object")
                @yield("css_rotate_object")
            @else
                @include("components.rubik")
            @endif
        </div>
    </section>

    @hasSection('article-reference')
        <nav
            class="border-2 border-blue-400 rounded-xl mb-4 grid grid-cols-subgrid overflow-hidden bg-black ">
            <h2 class="text-center text-sky-400 aspect-[281/35] md:aspect-[281/22]  content-center ">
                {{ __('default.in_this_article') }}
            </h2>
            <div class="bg-zinc-900 py-px mx-0.5"></div>
            <ul id="article_reference">
                @yield('article-reference')
            </ul>
        </nav>
    @endif

    <nav id="recent_arts"
         class="border-2 border-blue-400 rounded-xl mb-4 grid grid-cols-subgrid overflow-hidden bg-black">
        <h2 class="text-center text-sky-400 aspect-[281/35] md:aspect-[281/22] lg:aspect-[281/44] content-center">
            {{ __('default.recent_arts') }}
        </h2>
        <div class="bg-zinc-900 py-px mx-0.5"></div>
        <ul>
            @foreach(Art::last(Config::get('site.max_arts_in_recent_card')) as $art)
                @include('components.card', ['text' => __("art.$art->identifier.title"), 'link' => route('art', ['language' => App::currentLocale(), 'identifier' => $art->identifier]), 'background' => $art->card, 'alt' => '', 'width_disc' => 1])
            @endforeach
        </ul>
    </nav>

    <nav id="contacts"
         class="border-2 border-blue-400 rounded-xl mb-4 grid grid-cols-subgrid overflow-hidden bg-black">
        <h2 class="text-center text-sky-400 aspect-[281/35] md:aspect-[281/22] lg:aspect-[281/44] content-center">
            {{ __('default.contacts') }}
        </h2>
        <div class="bg-zinc-900 py-px mx-0.5"></div>
        <ul>
            @include('components.card', ['text' => "Email", 'link' => 'mailto:contact@uotlaf.com', 'background' => Theme::get('card_email'), 'alt' => '', 'width_disc' => 1])
            @include('components.card', ['text' => "Twitter", 'link' => 'https://twitter.com/uotlaf', 'background' => Theme::get('twitter_bg'), 'alt' => '', 'width_disc'=> 1])
            @include('components.card', ['text' => "Bluesky", 'link' => 'https://bsky.app/profile/uotlaf.com', 'background' => Theme::get('bluesky_bg'), 'alt' => '', 'width_disc'=> 1])
        </ul>
    </nav>
</section>
<footer class="col-span-6 select-none">
    <div class="justify-center flex flex-wrap space-x-2">
        @include('components/image',
        [
            'source' => env('CDN_PATH')."/asset/badge/html_incomp/html_incomp",
            'alt' => 'HTML INCOMPETENCE AHEAD'
        ])
        @include('components/image',
        [
            'source' => env('CDN_PATH')."/asset/badge/fbi_top30/fbi_top30",
            'alt' => 'FBI - THIS SITE HAS BEEN RATED A TOP 30 ILLEGAL WEBSITE ON THE BUREAU OF INVESTIGATION PHISHING LIST'
        ])
        @include('components/image',
        [
            'source' => env('CDN_PATH')."/asset/badge/last_updated/last_updated",
            'alt' => 'LAST UPDATED: 03/11/2002'
        ])
        @include('components/image',
        [
            'source' => env('CDN_PATH')."/asset/badge/lost_stolen_items/lost_stolen_items",
            'alt' => 'THIS WEBSITE IS NOT RESPONSIBLE FOR LOST OR STOLEN ITEMS'
        ])
        @include('components/image',
        [
            'source' => env('CDN_PATH')."/asset/badge/ctrl_a_top/ctrl_a_top",
            'alt' => 'CTRL+A TO COPY ARCTICLE'
        ])
    </div>
    <div class="text-center my-2">{{ __("default.footer_text") }}</div>
    <div class="text-center my-2">{{ __("default.phrase") }}</div>
</footer>
<style>
    {{--        Cursors     --}}
        body {
        cursor: url({{Theme::get('cursor.avif')}}) 13 13, auto;
    }

    a {
        cursor: url({{Theme::get('cursor_hover.avif')}}) 26 26, pointer;
    }

    .cursor-rotate {
        cursor: url({{Theme::get('cursor_rotate.avif')}}) 26 26, row-resize;
    }
</style>
</body>
</html>
