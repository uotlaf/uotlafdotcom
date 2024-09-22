{{---
language:en
identifier:about
title:Welcome to my home!
subtitle:About me
author:uotlaf
hide_from_posts:True
created_at:2024-07-01
updated_at:none
---}}
@php use App\Models\Persona; @endphp
@extends('article')
@section('title', __('default.about'))
@section('hide_timestamp', true)
@section('description')
    The page where I talk about myself
@endsection
@section('og:image')
    {{ \App\Models\Theme::get('card_about') }}.png
@endsection
@section('article_background')
    @include('components/image',
        ['class' => "h-full w-full object-cover",
        'source' => \App\Models\Theme::get('card_about'),
        'alt' => 'About',
        'effects' => ['grayscale']])
@endsection
@section('article')
    <div class="flex justify-center">
        @include('components.image', [
            'class' => "rounded-full w-64 border-white border-solid border-2",
            'source' => Persona::where('name', 'uotlaf')->first()->photo,
            'alt' => "uotlaf's fursona",
            'width_disc' => 1
        ])
    </div>
    <div class="h-4"></div>
    <p>
        I'm uotlaf, a computer science undergraduate who always has a ton of ideas but never finishes any of them.
    </p>
    <p>
        This is my personal space, a place I decided to create so as not to lose everything I do. The main part is the
        blog, but the site also extends to the arts that I don't do and an area to serve as a presentation corner. Of
        course, I'm also using it to see if I can make a decent site (The idea of this site is to make it using as
        little js as possible).
    </p>
    <p>
        There is a version for every computer I have, and you can access it through the sidebar, url or from the
        computer itself. These versions are in the left bar (I will add others as I add to the collection).
    </p>
    <p>
        Yeah, if you couldn't tell from this page, I'm also a furry. The triple alliance of
        furry+computing+student
    </p>
    <p>
        If this site seems strange, it follows the design of Android 4.1 (hence the strong blue). For me, it is the
        best-looking Android to date and that is why I decided to use this color scheme. The idea of using an old
        layout comes from the sites that people make on neocities (there are some on the webring that are on the left)
    </p>
    <p>
        Oh, this site was also inspired by some people I usually follow, like <a class="link"
            href="https://xeiaso.net">xeiaso.net</a>,
        <a class="link" href="https://kernel32.xyz">kernel32.xyz</a> and <a class="link"
            href="https://worthdoingbadly.com">worthdoingbadly.com</a>
    </p>

    <h2 class="text-center">Important information about using this website</h2>
    <p>
        This site is licensed under the BSD 3-Clause NON-AI License. A copy of the license can be found
        <a class="link" href="/LICENSE.txt">here</a>. If you would like an exception to this license, please contact me using the
        links available on the right side of this page.
    </p>

    <p>
        Want to add me to the webring? The badge is available <a class="link" href={{env('CDN_PATH')."/asset/badge/emerald/emerald.gif"}}>here</a>. You can add a
        tag like this:
    </p>
    <div class="flex justify-center">
        <img src={{env('CDN_PATH')."/asset/badge/emerald/emerald.avif"}} alt="uotlaf's badge">
    </div>

    @include("components.code_block", ['language' => 'html', 'code' =>
     "<img src='".env('CDN_PATH')."/asset/badge/emerald/emerald.selected_file_format"."' alt=\"uotlaf's badge\">"
    ])

    <p>
        The code for this site is available <a class="link" href="https://github.com/uotlaf/uotlafdotcom">in this repository</a>
    </p>

@stop
