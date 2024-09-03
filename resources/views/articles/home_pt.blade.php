{{---
language:br
identifier:home_br
title:Início
author:uotlaf
hide_from_posts:True
created_at:2024-07-01
updated_at:none
---}}
@extends('template')
@section('title', __('default.title_home'))
@section('window_title', __('default.site_name'))
@section('content')
    <p>
        Aqui é o meu espaço pessoal, um lugar que eu resolvi fazer pra não perder tudo o que faço. A parte principal
        é o
        blog, mas o site também se extende pra as artes que eu não faço e uma área pra servir de canto de
        apresentação.
        Claro que eu também tô usando pra ver se consigo fazer um site decente
    </p>
    <p>Na esquerda tem uma lista de partes do site. Se deseja ver as coisas que falo, vai nos <a
            href="{{"/articles_".App::currentLocale()}}">posts</a>.
        Dá uma olhada também nas <a href="{{"/arts_".App::currentLocale()}}">artes</a>.
    </p>
    <p>
        Nas laterais também tem algumas informações especiais. Na direita tem uma área com alguma coisa relacionada ao
        artigo(ou um cubo feito só com css quando não tem nada). Também tem meus contatos caso você queira trocar uma idéia
    </p>
    <p>Novo no site? Recomendo dar uma passada na página <a href="{{"/about_".App::currentLocale()}}">{{__('default.about')}}</a>. Tem umas informações boas lá</p>
    <p>Ah, esse cubo na direita é movível se tu tem js habilitado.</p>
@stop

