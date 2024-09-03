@php
    use Spatie\ShikiPhp\Shiki;
@endphp
<div class="code_block bg-[#222323] block rounded-lg">
    <span class="px-6 select-none">{{ $language }}</span>
    <div class="bg-[#3B3C3D] py-px mx-1 my-0.5"></div>
    <div class="flex flex-row">
        <code class="code_numbers grid grid-cols-1 content-between px-2">
        </code>
        {!! Shiki::highlight(
            code: $code,
            language: strtolower($language),
            theme: Storage::disk('themes')->path(Config::get('site.current_theme')."/code.json")
        ); !!}
    </div>
</div>

