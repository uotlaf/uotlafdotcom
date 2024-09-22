{{---
language:en
identifier:home
title:Home
subtitle:Homepage
author:uotlaf
hide_from_posts:True
created_at:2024-07-01
updated_at:none
---}}
@extends('article')
@section('title', __('default.title_home'))
@section('window_title', __('default.site_name'))
@section('hide_timestamp', true)
@section('description')
    This is my personal space, a place i decided to create so i dont lose everything i do.
@endsection
@section('og:image')
    {{\App\Models\Art::randomBanner()}}.png
@endsection
@section('article_background')
    @include('components/image',
        ['class' => "h-full w-full object-cover",
        'source' => \App\Models\Theme::get('companion_center'),
        'alt' => 'Home icon',
        'effects' => ['grayscale']])
@endsection
@section('article')
    <p>
        Hi there! This is my personal space, a place i decided to create so i dont lose everything i do. The main part
        is the blog, but this site also extends to the arts(that i don't do) and an area to serve as a presentation
        corner. Of course, I'm also using it to see if i can make a decent site.
    </p>
    <p>On the left is a list of parts of the site. If you want to see the things I talk about, go to <a
            href="/articles_{{App::currentLocale()}}/">posts</a>.
        Also take a look at the <a href="/arts_{{App::currentLocale()}}">arts</a>.
    </p>
    <p>
        There is also some special information on the sides. On the right there is an area with something related to the
        article (or a cube made only with CSS when there is nothing). There are also my contacts in case you want to
        exchange ideas.
    </p>
    <p>New to the site? I recommend checking out the <a href="/about_{{App::currentLocale()}}">{{__('default.about')}}</a> page. There is some
        good information there.
    </p>
    <p>Ah, that cube on the right is movable if you have js enabled.</p>
@stop

