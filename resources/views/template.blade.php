@php
    use App\Models\Art;use App\Models\Theme;use Illuminate\Support\Facades\App;
    $other_locale = '_pt';
    if (App::currentLocale() == 'pt') {
        $other_locale = '_en';
    }
@endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="darkreader-lock">
    @hasSection("window_title")
        <title>@yield("window_title")</title>
    @else
        <title>
            @yield("title")</title>
    @endif
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white">
{{-- Margem lateral --}}
<div id="usable_area" class="lg:mx-20 xl:mx-40">
    {{--    Banner     --}}
    @include('components.banner')
    {{--  3 DIVs  --}}
    <div id="main_grid" class="lg:flex lg:flex-wrap gap-1">
        <section id="left_card" class="lg:w-1/6 hidden lg:block">
            @foreach ([
                __('default.navigation') => [
                    ['text' => __('default.home'), 'link' => "/home_".App::currentLocale(), 'background' => Theme::get('card_home')],
                    ['text' => __('default.posts'), 'link' => '/articles_'.App::currentLocale(), 'background' => Theme::get('card_posts')],
                    ['text' => __('default.arts'), 'link' => '/arts_'.App::currentLocale(), 'background' => Theme::get('card_arts')],
                    ['text' => __('default.about'), 'link' => '/about_'.App::currentLocale(), 'background' => Theme::get('card_about')],
                    ['text' => __('default.change_locale'), 'link' => str_replace('_'.App::currentLocale(), $other_locale, Request::url()), 'background' => Theme::get('card_3ds')],
                ],
//                __('default.projects') => [
//                    ['text' => __('projects.1'), 'link' => '/', 'background' => Theme::get('twitter_bg')]
//                ],
                __('default.nerd_things') => [
                    ['text' => __('default.gpg_key'), 'link' => '/uotlaf.gpg', 'background' => Theme::get('card_gpg')],
                    ['text' => __('default.rss_feed'), 'link' => '/articles/rss_feed_'.App::currentLocale(), 'background' => Theme::get('card_rss')],
                    ],
//                __('default.other_versions') => [
//                    ['text' => __('versions.3ds'), 'link' => '/', 'background' => Theme::get('card_3ds')]
//                ],
                __('default.webring') => [
                    ['text' => "inky1003", 'link' => 'https://inky1003.com/', 'background' => Theme::get('card_default')]
                ],
                ] as $name => $cards)
                <nav
                    class="md:grid border-2 border-blue-400 rounded-xl my-4 grid grid-cols-subgrid overflow-hidden bg-black">
                    <h2 class="text-center text-sky-400 md:aspect-[281/44] content-center select-none">
                        {{ $name }}
                    </h2>
                    <span class="bg-zinc-900 py-px mx-0.5"></span>
                    <ul>
                        @foreach ( $cards as $card)
                            <li>
                                @include('components.card', ['text' => $card['text'], 'link' => $card['link'], 'background' => $card['background'], 'alt' => "", 'width_disc' => 1])
                            </li>
                        @endforeach
                    </ul>
                </nav>
            @endforeach
        </section>
        <section id="center_card"
                 class="border-2 border-blue-400 rounded-xl my-4 grid grid-cols-subgrid overflow-hidden bg-black flex-1 py-5 px-5 relative">
            <div class="flex flex-col">
                {{-- Article title and subtitle --}}
                <div class="justify-center mb-4 flex relative z-10">
                    <div>
                        <div class="bg-blue-500 h-0.5"></div>
                        <h2 class="text-4xl font-bold">@yield("title")</h2>
                        <div class="bg-blue-500 h-0.5"></div>
                    </div>
                </div>
                @hasSection('article_mode')
                    <div class="flex justify-center relative z-10">
                        <h2>@yield("subtitle")</h2>
                    </div>
                @endif
                @hasSection('article_background')
                    <div class="absolute top-0 left-0 h-full w-full opacity-10">
                        @yield("article_background")
                    </div>
                @endif
                <article class="relative z-10">
                    @yield("content")
                </article>
                @hasSection('article_mode')
                    <div id="article_tags relative z-10">
                        <h2>Tags:</h2>
                        <ul>
                            @foreach( $article->tags()->get() as $tag)
                                <li>
                                    <a class="text-blue-600 dark:text-blue-500 hover:underline"
                                       href={{"/articles_".App::currentLocale()."/tag/".$tag->name}}>
                                        {{ __("articletags.$tag->name") }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </section>
        <section id="right_card" class="lg:w-1/6 hidden lg:block">

            {{--     Cube      --}}
            <section class="border-2 border-blue-400 rounded-xl my-4 grid grid-cols-subgrid overflow-hidden bg-black">
                <div id="3d_object"
                     class="relative aspect-square content-center grid justify-center select-none cursor-rotate">
                    @hasSection("css_rotate_object")
                        @yield("css_rotate_object")
                    @else
                        @include("components.rubik")
                    @endif
                </div>
            </section>

            @hasSection('article-reference')
                <nav
                    class="border-2 border-blue-400 rounded-xl my-4 grid grid-cols-subgrid overflow-hidden bg-black select-none">
                    <h2 class="text-center text-sky-400 aspect-[281/44] content-center select-none">
                        {{ __('default.in_this_article') }}
                    </h2>
                    <div class="bg-zinc-900 py-px mx-0.5"></div>
                    <ul id="article_reference">
                        @yield('article-reference')
                    </ul>
                </nav>
            @endif

            <nav id="recent_arts"
                 class="border-2 border-blue-400 rounded-xl my-4 grid grid-cols-subgrid overflow-hidden bg-black">
                <h2 class="text-center text-sky-400 aspect-[281/44] content-center select-none">
                    {{ __('default.recent_arts') }}
                </h2>
                <div class="bg-zinc-900 py-px mx-0.5"></div>
                <ul>
                    @foreach(Art::last(Config::get('site.max_arts_in_recent_card')) as $art)
                        @include('components.card', ['text' => __("art.$art->identifier.title"), 'link' => "/arts_".App::currentLocale()."/$art->identifier", 'background' => $art->card, 'alt' => '', 'width_disc' => 1])
                    @endforeach
                </ul>
            </nav>

            <nav id="contacts"
                 class="border-2 border-blue-400 rounded-xl my-4 grid grid-cols-subgrid overflow-hidden bg-black">
                <h2 class="text-center text-sky-400 aspect-[281/44] content-center select-none">
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
    </div>
    <footer class="lg:mx-20 xl:mx-40">
        {{--    Itens do footer    --}}
        <div class="justify-center space-x-2 flex flex-wrap select-none">
            @include('components/image',
            [
                'class' => '',
                'source' => env('CDN_PATH')."/asset/badge/html_incomp/html_incomp",
                'alt' => 'HTML INCOMPETENCE AHEAD'
            ])
            @include('components/image',
            [
                'class' => '',
                'source' => env('CDN_PATH')."/asset/badge/fbi_top30/fbi_top30",
                'alt' => 'FBI - THIS SITE HAS BEEN RATED A TOP 30 ILLEGAL WEBSITE ON THE BUREAU OF INVESTIGATION PHISHING LIST'
            ])
            @include('components/image',
            [
                'class' => '',
                'source' => env('CDN_PATH')."/asset/badge/last_updated/last_updated",
                'alt' => 'LAST UPDATED: 03/11/2002'
            ])
            @include('components/image',
            [
                'class' => '',
                'source' => env('CDN_PATH')."/asset/badge/lost_stolen_items/lost_stolen_items",
                'alt' => 'THIS WEBSITE IS NOT RESPONSIBLE FOR LOST OR STOLEN ITEMS'
            ])
            @include('components/image',
            [
                'class' => '',
                'source' => env('CDN_PATH')."/asset/badge/ctrl_a_top/ctrl_a_top",
                'alt' => 'CTRL+A TO COPY ARCTICLE'
            ])
        </div>
        <p class="text-center select-none">{{ __("default.footer_text") }}</p>
        <p class="text-center select-none">{{ __("default.phrase") }}</p>
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
</div>
</body>
