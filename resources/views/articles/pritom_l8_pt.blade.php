{{---
language:pt
identifier:pritom_l8
title:Dumpando o firmware do pritom L8 e instalando uma GSI
subtitle:Como fazer um tablet barato ficar bem mais usável
author:uotlaf
path_banner_light:banner_light
path_banner_dark:banner_dark
assets_folder:example
created_at:2024-07-01
hide_from_posts:True
updated_at:none
tags:tablet
---}}
@extends('template')
@section('title', "Dumpando o firmware do pritom L8")
@section('subtitle', "E instalando uma GSI")
@section('article_mode', true)
@section('article')
    <p>
    Nessa última leva o aliexpress,eu resolvi que ia comprar um tablet. Mas não queria uma coisa muito poderosa: Era no máximo para servir de segundo monitor via RDP.
    O escolhido foi o Pritom L8, um tablet de 250 reais com um Allwinner A523 e 4gb de ram. Apesar do preço, ele é bem competente quando o assunto é performance pra coisas básicas. Mas tem um grande problema: O stock firmware
    Este tablet foi escolhido justamente por vir com android 13, o que significa que ele provavelmente tem suporte pra GKI(spoiler: tem) e possivelmente é compatível com as mais diversas GSIs
    A grande questão é: Como instalar e como ter a certeza que eu posso voltar para o firmware stock caso alguma coisa dê errado?
    </p>
    <h2>Especificações</h2>
    <p>O tablet veio com a seguinte configuração:</p>
    <table>
        <tr>
            <th>Configuração</th>
            <th>Produto</th>
        </tr>
        <tr>
            <td>SOC</td>
            <td>Allwinner H523</td>
        </tr>
        <tr>
            <td>Plataforma</td>
            <td>Sunxi sun55iw3p1</td>
        </tr>
        <tr>
            <td>Ram</td>
            <td></td>
        </tr>
        <tr>
            <td>Armazenamento</td>
            <td></td>
        </tr>
        <tr>
            <td>Touchscreen</td>
            <td>gslX680</td>
        </tr>
        <tr>
            <td>Kernel</td>
            <td>5.15.119-android13-8</td>
        </tr>
        <tr>
            <td>Câmeras</td>
            <td>Traseira: Ominivision ov8865. Frontal: GalaxyCore GC02m1</td>
        </tr>
        <tr>
            <td>PMIC</td>
            <td>X-Powers AX20X</td>
        </tr>
    </table>
    É, uma das cãmeras é falsa. Quem diria
@endsection
