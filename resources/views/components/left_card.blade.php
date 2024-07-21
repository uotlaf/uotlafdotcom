<section id="left">
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
                @include('components.card', ['text' => __('default.posts'), 'link' => '/posts', 'background' => "/images/default_card_background.png"])
            </li>
            <li>
                @include('components.card', ['text' => __('default.arts'), 'link' => '/arts', 'background' => "/images/default_card_background.png"])
            </li>
            <li>
                @include('components.card', ['text' => __('default.about'), 'link' => '/about', 'background' => "/images/default_card_background.png"])
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


</section>
