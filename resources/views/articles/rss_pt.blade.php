{{---
language:pt
identifier:rss
title:Sobre os feeds RSS
subtitle:
author:uotlaf
path_banner_light:
path_banner_dark:
assets_folder:
created_at:2024-07-22
hide_from_posts:1
updated_at:none
tags:
---}}
@extends('article')
@section('title', "Sobre os feeds RSS")
@section('hide_timestamp', true)
@section('article_background')
    @include('components/image',
        ['class' => "h-full w-full object-cover",
        'source' => \App\Models\Theme::get('card_rss'),
        'alt' => 'RSS',
        'effects' => ['grayscale']])
@endsection
@section('article')
    <div class="flex justify-center">
        @include('components.image', [
            'class' => "rounded-xl w-48 border-white border-solid border-2",
            'source' => \App\Models\Theme::get('card_rss'),
            'alt' => "RSS Feed Icon"])
    </div>
    <p>Este site contém os seguintes feeds RSS:</p>
    <a class="link" href="/pt/rss/arts">Artes - Lista todas as artes em ordem decrescente</a><br>
    <a class="link" href="/pt/rss/articles">Artigos - Lista todas os artigos públicos em ordem decrescente</a>
    <p>Para utilizar, aponte seu leitor RSS para o início deste site. Caso não consiga utilizar dessa forma, aponte para os links acima</p>
    <p>Os feeds também estão disponíveis nestas linguagens:</p>
    <a class="link" href="/en/rss/arts">Arts - List of all arts in descending order</a><br>
    <a class="link" href="/en/rss/articles">Articles - List all public articles in descending order</a>
@endsection
