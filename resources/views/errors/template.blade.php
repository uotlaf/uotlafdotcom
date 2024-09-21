<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<html lang="pt-br">
<head>
    <title>Rise and Shine, Mr. Freeman</title>
    @vite('resources/js/error.js')
    @vite('resources/css/error.css')
</head>
<body>
<div id="bg" class="parallax">
    <div id="journal" class="parallax" style="background-image: url({{\App\Models\Theme::get('error_bg.avif')}})">
        <div id="back" class="parallax " style="background-image: url({{\App\Models\Theme::get('error_hellga_bg.avif')}})">
            <img id="hellga" src="{{\App\Models\Theme::get('error_hellga.avif')}}" alt="Hellga">
        </div>
    </div>
</div>
<div id="text">
    <h1 id="code" >@yield('error_text')</h1>
</div>
</body>
</html>

