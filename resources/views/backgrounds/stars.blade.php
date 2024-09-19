<div class="overflow-clip absolute top-0 left-0 w-full h-full hidden lg:block">
    <div id="stars" class="absolute h-full w-full bg-repeat animate-[bg-stars_300s_infinite_alternate]" style="z-index: -1; background-image: url('{{\App\Models\Theme::get('stars.avif')}}')"></div>
</div>

<style>
    body:before {
        background-image: url('{{\App\Models\Theme::get('stars.avif')}}');
        @apply absolute h-full w-full bg-repeat animate-[bg-stars_300s_infinite_alternate];
        z-index: -1;
    }
</style>
