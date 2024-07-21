@php use App\Models\Art;use App\Models\Article; $arc = Article::where('identifier', $article)->first()@endphp
    <!DOCTYPE html>
<html>
<head>
    <title>Site do uotlaf</title>
    <meta name="darkreader-lock">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
<div id="usable_area">
    <header>
        @include('components.banner')
    </header>
    <div id="main_body">
        <div id="left">
            <div id="navigation" class="card_home">
                <h2 class="card_title">
                    {{ __('default.navigation') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    <li>
                        @include('components.card', ['text' => __('default.home'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                    <li>
                        @include('components.card', ['text' => __('default.posts'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                    <li>
                        @include('components.card', ['text' => __('default.arts'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                    <li>
                        @include('components.card', ['text' => __('default.about'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                </ul>
            </div>

            <div id="projects" class="card_home">
                <h2 class="card_title">
                    {{ __('default.projects') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    {{--                            Em construção  --}}
                    <li>P1</li>
                    <li>P2</li>
                    <li>P3</li>
                    <li>P4</li>
                </ul>
            </div>

            <div id="nerd_things" class="card_home">
                <h2 class="card_title">
                    {{ __('default.nerd_things') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    <li>
                        @include('components.card', ['text' => __('default.gpg_key'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                    <li>
                        @include('components.card', ['text' => __('default.rss_feed'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                </ul>
            </div>

            <div id="other_versions" class="card_home">
                <h2 class="card_title">
                    {{ __('default.other_versions') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    <li>
                        @include('components.card', ['text' => __('versions.3ds'), 'link' => '/', 'background' => "/images/default_card_background.png"])
                    </li>
                </ul>
            </div>

            <div id="webring" class="card_home">
                <h2 class="card_title">
                    {{ __('default.webring') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    <li>
                        @include('components.card', ['text' => "webring1", 'link' => '/', 'background' => "/images/card_email_background.png"])
                    </li>
                </ul>
            </div>


        </div>
        <div id="center">
            <div class="card_home">
                <div id="article_title_and_subtitle">
                <div id="article_title_div">
                    <div class="card_separator blue_separator"></div>
                    <a>{{ $arc['title'] }}</a>
                    <div class="card_separator blue_separator"></div>
                </div>

                @if (! empty($arc['subtitle']))
                    <div id="article_subtitle_div">
                        <a>{{ $arc['subtitle'] }}</a>
                        <div class="card_separator"></div>
                    </div>
                @endif
                </div>
                <article>
                    {!! $arc['content'] !!}
                </article>
            </div>
        </div>
        <div id="right">
            <div id="recent_posts" class="card_home">
                <h2 class="card_title">
                    {{ __('default.recent_posts') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    ainda a fazer
                </ul>
            </div>

            <div id="recent_arts" class="card_home">
                <h2 class="card_title">
                    {{ __('default.recent_arts') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    @foreach(Art::getLast(Config::get('site.max_arts_in_recent_card')) as $art)
                        @include('components.card', ['text' => $art->name, 'link' => '/sdsadas', 'background' => $art->path_card_light])
                    @endforeach
                </ul>
            </div>

            <div id="contacts" class="card_home">
                <h2 class="card_title">
                    {{ __('default.contacts') }}
                </h2>
                <div class="card_separator"></div>
                <ul>
                    <li>
                        @include('components.card', ['text' => "Email: contact@uotlaf.com", 'link' => 'sdsadas', 'background' => "/images/card_email_background.png"])
                    </li>
                    <li>
                        @include('components.card', ['text' => "Twitter: uotlaf", 'link' => 'sdsadas', 'background' => "/images/card_twitter_background.png"])
                    </li>
                </ul>
            </div>


        </div>
    </div>
    <p class="footer_text">{{  __("default.footer_text") }}</p>
    <p class="footer_text">{{ __("default.phrase") }}</p>
</div>
</body>
</html>
