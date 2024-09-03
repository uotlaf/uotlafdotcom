{{---
language:br
identifier:about_br
title:Bem vindo ao meu canto!
author:uotlaf
hide_from_posts:True
created_at:2024-07-01
updated_at:none
---}}
@php use App\Models\Persona; @endphp
@extends('template')
@section('title', __('default.about'))
@section('content')
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
        Eu sou uotlaf, um graduando em ciência da computação que sempre tem um monte de idéias, mas nunca termina
        nenhuma
    </p>
    <p>
        Aqui é o meu espaço pessoal, um lugar que eu resolvi fazer pra não perder tudo o que faço. A parte principal
        é o
        blog, mas o site também se extende pra as artes que eu não faço e uma área pra servir de canto de
        apresentação.
        Claro que eu também tô usando pra ver se consigo fazer um site decente(A idéia desse site é fazer usando o
        mínimo possível de js)
    </p>
    <p>
        Tem uma versão pra todo computador que eu tenho, e você pode acessar pela barra lateral, url ou pelo próprio
        computador. Essas versões ficam na barra da esquerda(eu vou adicionando outros conforme vou adicionando a
        coleção)
    </p>
    <p>
        É, se não deu pra perceber por essa página, eu também sou furry. A tríplice aliança de
        furry+computação+estudante
    </p>
    <p>
        Se esse site parece estranho, ele segue o design do android 4.1(por isso o azul forte). Pra mim é o android
        mais
        bonito até hoje e por isso resolvi usar este esquema de cores. A idéia de usar um layout antigo vem dos
        sites
        que a galera faz no neocities(Tem uns no webring que tá na esquerda)
    </p>
    <p>
        Ah, esse site também foi inspirado em uma galera que eu costumo acompanhar, como <a
            href="https://xeiaso.net">xeiaso.net</a>,
        <a href="https://kernel32.xyz">kernel32.xyz</a> e <a
            href="https://worthdoingbadly.com">worthdoingbadly.com</a>
    </p>

    <h2 class="text-center">Informações importantes sobre o uso este site</h2>

    <p>
        Este site está licenciado sob a licença BSD 3-Clause NON-AI. Uma cópia da licença pode ser encontrada <a
            href="/LICENSE.txt">aqui</a>. Caso queira uma exceção a esta licença, me contacte pelos links disponíveis na
        direita desta página.
    </p>

    <p>
        Quer me adicionar ao webring? A insígnia está disponível <a href={{env('CDN_PATH')."/asset/badge/emerald/emerald.gif"}}>aqui</a>. Você pode adicionar uma tag desta forma:
    <div class="flex justify-center">
        <img src={{env('CDN_PATH')."/asset/badge/emerald/emerald.gif"}} alt="uotlaf's badge">
    </div>
    </p>

    @include("components.code_block", ['language' => 'html', 'code' =>
         "<img src='".env('CDN_PATH')."/asset/badge/emerald/emerald.gif"."' alt=\"uotlaf's badge\">"
        ])

    <p>
        O código deste site está disponível <a href="https://github.com/uotlaf/uotlafdotcom">neste repositório</a>
    </p>

@stop
