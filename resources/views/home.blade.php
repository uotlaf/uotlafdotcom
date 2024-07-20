@php use App\Models\Art; @endphp
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
        {{--                @include('components.banner')--}}
    </header>
    <div id="main_body">
        <div id="left">
            <div id="navigation" class="card_home">
                <p class="card_title">
                    {{ __('default.navigation') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    <li>{{ __('default.home') }}</li>
                    <li>{{ __('default.posts') }}</li>
                    <li>{{ __('default.arts') }}</li>
                    <li>{{ __('default.about') }}</li>
                </ul>
            </div>

            <div id="projects" class="card_home">
                <p class="card_title">
                    {{ __('default.projects') }}
                </p>
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
                <p class="card_title">
                    {{ __('default.nerd_things') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    <li>{{ __('default.gpg_key') }}</li>
                    <li>{{ __('default.rss_feed') }}</li>
                </ul>
            </div>

            <div id="other_versions" class="card_home">
                <p class="card_title">
                    {{ __('default.other_versions') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    <li>{{ __('versions.3ds') }}</li>
                </ul>
            </div>

            <div id="webring" class="card_home">
                <p class="card_title">
                    {{ __('default.webring') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    <li>webring1</li>
                </ul>
            </div>


        </div>
        <div id="center">
            <p class="card_title">
                {{ __('dsdsadasdsdsdasa') }}
            </p>
            <div class="card_separator"></div>
            <ul>
                ainda a fazer
            </ul>
        </div>
        <div id="right">
            <div id="recent_posts">
                <p class="card_title">
                    {{ __('default.recent_posts') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    ainda a fazer
                </ul>
            </div>

            <div id="recent_arts" class="card_home">
                <p class="card_title">
                    {{ __('default.recent_arts') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    @foreach(Art::getLast(Config::get('site.max_arts_in_recent_card')) as $art)
                        <li>
                        @include('components.card', ['text' => $art->name, 'link' => 'sdsadas', 'background' => $art->path_light])
                        </li>
                    @endforeach
                </ul>
            </div>

            <div id="contacts" class="card_home">
                <p class="card_title">
                    {{ __('default.contacts') }}
                </p>
                <div class="card_separator"></div>
                <ul>
                    <li>
                        @include('components.card', ['text' => "Email: contact@uotlaf.com", 'link' => 'sdsadas', 'background' => ""])
                    </li>
                    <li>
                        @include('components.card', ['text' => "Twitter: uotlaf", 'link' => 'sdsadas', 'background' => ""])
                    </li>
                </ul>
            </div>


        </div>
    </div>
</div>
</body>
</html>
