<div id="posts">
    @foreach(\App\Models\Article::where('hide_from_posts', 0)->get() as $article)
    <a class="post" href="/posts/{{ $article['identifier'] }}" style="background-image: url({{$article['path_banner_light']}});">
        <div class="post_details">
            <p class="post_title">
                {{ $article['title'] }}
            </p>
            <p class="post_subtitle">
                {{ $article['subtitle'] }}
            </p>
            <p class="post_info">
                {{ __('default.posted_in') }} {{ $article['created_at']->toDateString() }}{{ __('default.post_author') }} {{ $article['author'] }}
            </p>
        </div>
    </a>
    @endforeach
</div>
