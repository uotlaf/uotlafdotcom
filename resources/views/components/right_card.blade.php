@php use App\Models\Art;@endphp
<section id="right">
    <section id="recent_posts" class="card_home">
        <h2 class="card_title">
            {{ __('default.recent_posts') }}
        </h2>
        <div class="card_separator"></div>
        <ul>
            ainda a fazer
        </ul>
    </section>

    <section id="recent_arts" class="card_home">
        <h2 class="card_title">
            {{ __('default.recent_arts') }}
        </h2>
        <div class="card_separator"></div>
        <ul>
            @foreach(Art::getLast(Config::get('site.max_arts_in_recent_card')) as $art)
                @include('components.card', ['text' => $art->name, 'link' => '/sdsadas', 'background' => $art->path_card_light])
            @endforeach
        </ul>
    </section>

    <section id="contacts" class="card_home">
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
    </section>
</section>
