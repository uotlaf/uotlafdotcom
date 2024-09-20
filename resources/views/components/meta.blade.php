{{-- Article features--}}
@hasSection('tags')
    <meta name="keywords" content="@yield('tags')" />
@endif
@hasSection('author')
    <meta name="author" content="@yield('author')" />
@endif
{{-- Open Graph Tags --}}
@hasSection('title')
    <meta property="og:title" content="@yield('title')" />
@endif
@hasSection('description')
    <meta property="og:description" content="@yield('description')" />
@endif
@hasSection('og:type')
    <meta property="og:type" content="@yield('og:type')" />
@endif
@hasSection('og:image')
    <meta property="og:image" content="@yield('og:image')" />
@endif
@hasSection('og:image_large')
    <meta name="twitter:card" content="summary_large_image">
@endif
<meta property="og:url" content="{{request()->url()}}" />
<meta property="og:locale" content="{{app()->currentLocale()}}" />
<meta property="og:locale:alternate" content="{{$other_locale}}" />
<meta property="og:site_name" content="{{__("default.site_name")}}" />
<meta name="theme-color" content="#000000">

{{-- Article subtitle --}}
@hasSection('article')
    @sectionMissing('description')
            <meta property="og:description" content="{{$article->subtitle}}" />
    @endif
@endif
