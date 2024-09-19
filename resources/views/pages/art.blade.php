@php use App\Helpers\SummerHelper;use App\Models\Theme; @endphp
@extends('template')
@section('title', __("art.$art->identifier.title"))
@section('is_art', true)
@section('article_background')
    @include('components/image',
        ['class' => "h-full w-full object-cover grayscale",
        'source' => $art->photo,
        'alt' => $art->name,
        'width_disc' => 1])
@endsection
@section('content')
    <div class="flex justify-center overflow-hidden">
        <div class="relative group">
            <img id="main_photo" class="h-96 object-contain" src="{{$art->photo}}.png" alt={{$art->name}}>
            @if ($art->path_dark)
                <a id="version_switch" class="absolute bottom-0 left-0 bg-zinc-900/70 backdrop-blur-sm transition-all group max-w-2 group-hover:max-w-16" hidden
                   onclick="change_photo()">
                    @include('components/image',
                        ['class' => "h-10 opacity-0 group-hover:opacity-100",
                        'source' => Theme::get('switch_theme'),
                        'alt' => "Switch theme",
                        'width_disc' => 40,
                        'id' => 'version_switch_img'])
                </a>
            @endif
        </div>
    </div>
    <p>
        {{ __('art.name')}}: {{ __("art.$art->identifier.title") }}
    </p>
    <p>
        {{ __('art.description') }}:
    <p class="indent-8">
        {!! __("art.$art->identifier.description") !!}
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 text-left">
        <div>
            <p>
                {{ __('art.artist') }}:
                @foreach($art->artists as $artist)
                    <a class="text-blue-600 dark:text-blue-500 hover:underline"
                       href={{route('artist', ['language' => App::currentLocale(), 'identifier' => $artist->identifier])}}>
                        {{ $artist->name }}
                    </a>
                @endforeach
            </p>
            <p>
                {{ __('art.created_at') }}: {{ $art->created_at->toDateString() }}
            </p>
            <p>
                {{ __('art.personas') }}:
                @foreach($art->personas as $persona)
                    <a class="text-blue-600 dark:text-blue-500 hover:underline"
                       href={{route('persona', ['language' => App::currentLocale(), 'identifier' => $persona->identifier])}}>
                        {{ $persona->name }}
                    </a>
                @endforeach
            </p>
            <p>
                {{ __('art.suggestive_censor') }}:
                @if( $art->suggestive )
                    {{ __('default.yes') }}
                @else
                    {{ __('default.no') }}
                @endif
            </p>
        </div>
        <div>
            <p>
                {{ __('art.is_banner') }}:
                @if( $art->is_banner )
                    {{ __('default.yes') }}
                @else
                    {{ __('default.no') }}
                @endif
            </p>
            <p class="inline-flex">
                {{ __('art.links') }}:
                @foreach($art->links as $link)
                    <a href="{{ $link->link }}" class="content-center">
                        @include('components/image',
                                    ['class' => "h-4",
                                    'source' => Theme::get($link->icon),
                                    'alt' => $link->name,
                                    'width_disc' => 1])
                    </a>
                @endforeach
            </p>

            <p>
                {{ __('art.tags') }}:
            <ul class="list-disc">
                @foreach($art->tags as $tag)
                    <li class="ml-4">
                        <a href="{{route('arts_by_tag', ['language' => App::currentLocale(), 'identifier' => $tag->name])}}" class="text-blue-600 dark:text-blue-500 hover:underline">
                        {{ __("arttags.$tag->name") }}
                        </a>
                    </li>
                @endforeach
            </ul>
            </p>
        </div>
    </div>

    <script>
        @if (SummerHelper::is_summer())
            current = "{{$art->dark_photo}}.png";
            other = "{{$art->light_photo}}.png";
        @else
            current = "{{$art->light_photo}}.png";
            other = "{{$art->dark_photo}}.png";
        @endif
        img = document.getElementById('main_photo');
        button = document.getElementById('version_switch');
        button.hidden = false
        button_img = document.getElementById('version_switch_img');
        button_img_animation = "animate-[switch-spin_0.5s_ease-in-out]"

        function change_photo() {
            // Button animation
            button_img.classList.remove(button_img_animation);
            void button.offsetWidth;
            button_img.classList.add(button_img_animation);

            [current, other] = [other, current];
            img.src = current;
        }

    </script>
@endsection
