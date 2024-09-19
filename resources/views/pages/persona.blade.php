@php
    $arts = $persona->arts()->orderBy("created_at", "desc")->simplepaginate(Config('site.max_arts_per_page'));
@endphp
@extends('template')
@section('title', $persona->name)
@section('article_background')
    @include('components.image', [
            'class' => "h-full w-full object-cover grayscale",
            'source' => $persona->banner,
            'alt' => $persona->name,
            'width_disc' => 0.5
        ])
@endsection
@section('content')
    {{--   Profile Picture    --}}
    <div class="flex justify-center relative">
        @include('components.image', [
            'class' => "rounded-full w-64 border-white border-solid border-2",
            'source' => $persona->photo,
            'alt' => $persona->name,
            'width_disc' => 2
        ])
    </div>
    {{--  Page content        --}}
    <p class="z-10 relative">
    <div class="grid grid-cols-2">
        <p>
            <span class="font-bold">{{ __('persona.name')}}:</span> {{ $persona->name }}
        </p>
        <p>
            <span class="font-bold">{{ __('persona.species') }}:</span> {{ __('species.'.$persona->species) }}
        </p>
        <p>
                    <span
                        class="font-bold">{{ __('persona.age') }}:</span> {{ $persona->age }} {{ __('persona.years') }}
        </p>
        <p>
            <span class="font-bold">{{ __('persona.height') }}:</span> {{ $persona->height }}
        </p>
        <p>
            <span class="font-bold">{{ __('persona.weight') }}:</span> {{ $persona->weight }}
        </p>
        <p>
            <span class="font-bold">{{ __('persona.gender') }}:</span> {{ __('gender.'.$persona->gender) }}
        </p>
    </div>
    <p>
        <span class="font-bold">{{ __('persona.description') }}:</span>
    </p>

    <div class="" id="persona_description">
        @yield('persona.description')
    </div>

    <h3 class="flex justify-center">{{__('default.latest_arts')}}</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full">

        @foreach($arts as $art)
            @include('components.art_card', ['art' => $art])
        @endforeach
    </div>

    <nav class="flex justify-center space-x-2">
        @if ($arts->currentPage() != 1)
            <a class="hover:border-sky-400 border-black transition border-solid border-2 rounded-xl px-2.5 py-1"
               href="{{ $arts->PreviousPageUrl() }}">
                « {{ $arts->currentPage() - 1 }}
            </a>
        @endif
        @if ($arts->hasMorePages())
            <a class="hover:border-sky-400 border-black transition border-solid border-2 rounded-xl px-2.5 py-1"
               href="{{ $arts->NextPageUrl() }}">
                {{ $arts->currentPage() + 1 }} »
            </a>
        @endif
    </nav>
    </div>
@endsection
