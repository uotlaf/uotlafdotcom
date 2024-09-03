<div class="relative aspect-video rounded-xl overflow-hidden">
    <img id="{{ $identifier }}.thumbnail" class="absolute top-0 left-0 aspect-video w-full h-full" src="{{ $thumbnail }}" alt="{{ $title }}">

    <iframe id="{{ $identifier }}" class="absolute top-0 left-0 aspect-video h-full w-full"
            title="{{ $title }}"
            allow="encrypted-media;"
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"></iframe>

    <a id="{{ $identifier }}.button" href="javascript:
        document.getElementById('{{ $identifier }}').setAttribute('src','{{ $link }}');
        document.getElementById('{{ $identifier }}.thumbnail').style.setProperty('visibility', 'collapse');
        document.getElementById('{{ $identifier }}.button').style.setProperty('visibility', 'collapse');
        " class="drop-shadow-2xl h-full w-full content-center grid justify-center backdrop-blur-sm"
    ><span>
        {{ __('default.open_youtube_video') }}</span></a>

</div>
