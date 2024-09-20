{{---
language:pt
identifier:example1
title:Exemplo das features deste site
subtitle:Esse é um artigo exemplo
author:uotlaf
path_banner_light:banner_light
path_banner_dark:banner_dark
assets_folder:example
created_at:2024-07-01
hide_from_posts:0
updated_at:none
tags:example
---}}
@extends('article')
@section('title', "Teste do site")
@section('subtitle', "Esse é um artigo exemplo")
@section('article')
    <div class="flex justify-center overflow-hidden">
        @include('components.image', [
            'class' => "rounded-xl h-60",
            'source' => $article->banner,
            'alt' => "",
            'width_disc' => 1
        ])
    </div>
    <p>Este é um artigo exemplo mostrando as coisas que esse site tem</p>
    <h2 id="avisos">Avisos</h2>
    <p>Esse texto vai ser usado também pra mostrar coisas sobre essa página</p>
    <p>A imagem acima tem dois modos: uma versão escura e uma versão clara. Dependendo do mês, uma delas é mostrada por
        padrão. Para trocar entre elas, aperte no botão na parte inferior esquerda da imagem. Imagens com suporte vão
        mostrar este símbolo.</p>

    <h2 id="dialogos">Diálogos</h2>
    <p>Também pode acontecer de eu precisar citar alguma coisa ou descontrair o texto - Nesse caso, tem um componente
        disponível que é uma citação de um personagem - Exemplo abaixo</p>

    <div class="flex justify-center">
        @include('components.dialog', [
            "icon" => $article->getAsset("sonic.webp"),
            "name" => "Sonic the Hedgehog",
            "phrase" => "Aw yeah, This is happening!"])
    </div>

    <p>Dá pra fazer uma conversa entre os dois:</p>

    @include('components.dialog', [
        "icon" => $article->getAsset("grooves.webp"),
        "name" => "DJ Grooves",
        "phrase" => "I keep telling the Conductor to stop saying the M word, but he just  won't listen. He's gonna get himself cancelled someday, which is fine by  me. Just means he won't cheat at the next annual Bird Movie Awards!"])
    @include('components.dialog', [
        "icon" => $article->getAsset("conductor.webp"),
        "name" => "Conductor",
        "phrase" => "A-a-a-a-a-a MIERDERRR?! ON MY OWL EXPRESS?!?!",
        "position" => "right"])

    <p>Imagens normais também podem ser carregadas:</p>

    <div class="flex flex-row gap-2">
        <img alt="android 4.0 homescreen" class="w-1/4 object-cover" src="{{ $article->getAsset("android.webp") }}">
        <p>Would you look at all that stuff<br>
            They've got allen wrenches, gerbil feeders, toilet seats, electric heaters<br>
            Trash compactors, juice extractor, shower rods and water meters<br>
            Walkie-talkies, copper wires safety goggles, radial tires<br>
            BB pellets, rubber mallets, fans and dehumidifiers<br>
            Picture hangers, paper cutters, waffle irons, window shutters<br>
            Paint removers, window louvres, masking tape and plastic gutters<br>
            Kitchen faucets, folding tables, weather stripping, jumper cables<br>
            Hooks and tackle, grout and spackle, power foggers, spoons and ladles<br>
            Pesticides for fumigation, high-performance lubrication<br>
            Metal roofing, water proofing, multi-purpose insulation<br>
            Air compressors, brass connectors, wrecking chisels, smoke detectors<br>
            Tire guages, hamster cages, thermostats and bug deflectors<br>
            Trailer hitch demagnetizers, automatic circumcisers<br>
            Tennis rackets, angle brackets, Duracells and Energizers<br>
            Soffit panels, circuit brakers, vacuum cleaners, coffee makers<br>
            Calculators, generators, matching salt and pepper shakers</p>
    </div>

    <h2 id="embeds">Embeds</h2>
    <p>Dá pra botar embeds também:</p>

    @include('components.youtube_embed', [
    'identifier' => 'persona_music',
    'thumbnail' => 'https://i.ytimg.com/vi_webp/pHrJi9ThFgM/maxresdefault.webp',
    'link' => 'https://www.youtube-nocookie.com/embed/pHrJi9ThFgM?si=n8mupphr38u4WSZ9&amp;controls=0',
    'title' => 'Música boa'])

    <h2 id="codigo">Códigos</h2>
    <p>Código também:</p>
    @include('components.code_block', ['language' => 'C', 'code' =>
'#include <stdio.h>
int main() {
    printf("Códigos também são suportados");
}'])

    <br>

    @include('components.code_block', ['language' => 'yml', 'code' =>
'services:
    laravel.test:
        build:
            context: ./vendor/laravel/sail/runtimes/8.3
            dockerfile: Dockerfile
            args:
                WWWGROUP: \'${WWWGROUP}\'
        image: sail-8.3/app
        extra_hosts:
            - \'host.docker.internal:host-gateway\'
        ports:
            - \'${APP_PORT:-80}:80\'
            - \'${VITE_PORT:-5173}:${VITE_PORT:-5173}\'
        environment:
            WWWUSER: \'${WWWUSER}\'
            LARAVEL_SAIL: 1
            XDEBUG_MODE: \'${SAIL_XDEBUG_MODE:-off}\'
            XDEBUG_CONFIG: \'${SAIL_XDEBUG_CONFIG:-client_host=host.docker.internal}\'
            IGNITION_LOCAL_SITES_PATH: \'${PWD}\'
        volumes:
            - \'.:/var/www/html\'
        networks:
            - sail
        depends_on:
            - mysql
            - redis
    mysql:
        image: \'mysql/mysql-server:8.0\'
        ports:
            - \'${FORWARD_DB_PORT:-3306}:3306\'
        environment:
            MYSQL_ROOT_PASSWORD: \'${DB_PASSWORD}\'
            MYSQL_ROOT_HOST: \'%\'
            MYSQL_DATABASE: \'${DB_DATABASE}\'
            MYSQL_USER: \'${DB_USERNAME}\'
            MYSQL_PASSWORD: \'${DB_PASSWORD}\'
            MYSQL_ALLOW_EMPTY_PASSWORD: 1
        volumes:
            - \'sail-mysql:/var/lib/mysql\'
        networks:
            - sail
        healthcheck:
            test:
                - CMD
                - mysqladmin
                - ping
                - \'-p${DB_PASSWORD}\'
            retries: 3
            timeout: 5s
    redis:
        image: \'redis:alpine\'
        ports:
            - \'${FORWARD_REDIS_PORT:-6379}:6379\'
        volumes:
            - \'sail-redis:/data\'
        networks:
            - sail
        healthcheck:
            test:
                - CMD
                - redis-cli
                - ping
            retries: 3
            timeout: 5s
networks:
    sail:
        driver: bridge
volumes:
    sail-mysql:
        driver: local
    sail-redis:
        driver: local
'])

@stop
@section('article-reference')
    <li class="article_page_h1"><a href="#avisos">Avisos</a></li>
    <li class="article_page_h1"><a href="#embeds">Embeds</a></li>
    <li class="article_page_h1"><a href="#dialogos">Diálogos</a></li>
    <li class="article_page_h2"><a href="#codigo">Códigos</a></li>
@endsection

@section('css_rotate_object')
    <img id="top_gear_2_car" alt="top gear 2 car" class="select-none" draggable="false"
         src="{{ $article->getAsset('top_gear_2_car.gif') }}">
    <a
        id="reset_cube"
        class="
        absolute bottom-0 left-0
        flex h-10 group-hover:h-20 flex-col drop-shadow-2xl
        bg-zinc-900/70 backdrop-blur-sm px-2 py-2 transition-all rounded-tr-xl opacity-0"
        onclick="enable_rotation()">
        ⟳ {{ __("default.reset_position") }}
    </a>

    <script>
        let car = document.getElementById("top_gear_2_car");
        let div = document.getElementById("3d_object");
        let reset_button = document.getElementById("reset_cube")
        let images = [ @foreach (range(0, 20) as $number) '{{$article->getAsset("tio_gear_2_$number.webp")}}', @endforeach ]
        let current_rotation = 0;
        let current_mouse_pos = null;
        let original_image = car.src;

        function reset_mouse_position() {
            // Mouse is out of div. Reset current pos and disable movement follow
            disable_rotation();
            current_mouse_pos = null;
        }

        function disable_rotation() {
            div.removeEventListener('mousemove', rotate);
            div.removeEventListener('mouseleave', reset_mouse_position);
        }

        function enable_rotation() {
            car.src = original_image;
            reset_button.style.setProperty("opacity", 0);
        }

        function disable_animation() {
            // Add eventListeners
            div.addEventListener('mouseleave', reset_mouse_position);
            div.addEventListener('mousemove', rotate);
            reset_button.style.setProperty("opacity", 1);
            // div.removeEventListener("mousedown", disable_animation);
        }

        function rotate(event) {
            if (current_mouse_pos == null) {
                return current_mouse_pos = {'x': event.clientX, 'y': event.clientY};
            }

            current_rotation += (event.clientX - current_mouse_pos['x']) / 10;
            current_mouse_pos['x'] = event.clientX;
            current_mouse_pos['y'] = event.clientY;
            if (current_rotation > 20) {
                current_rotation = 0;
            } else if (current_rotation < 0) {
                current_rotation = 20;
            }


            car.src = images[Math.abs(parseInt(current_rotation))]
        }

        div.addEventListener('mousedown', disable_animation);
        div.addEventListener('mouseup', reset_mouse_position);
    </script>
@endsection
