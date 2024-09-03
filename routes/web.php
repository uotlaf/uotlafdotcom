<?php

use App\Models\Art;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Artist;
use App\Models\ArtTag;
use App\Models\Persona;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home_'.App::currentLocale());
});

Route::get('/home_{language}', function (String $language) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    return Cache::rememberForever("view.home_$language", function () use ($language) {
        App::setLocale($language);
        return view("articles/home_$language")->render();
    });
});

Route::get('/about_{language}', function (String $language) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    return Cache::rememberForever("view.about_$language", function () use ($language) {
        App::setLocale($language);
        return view("articles/about_$language")->render();
    });
});


Route::get('/arts_{language}/tag/{identifier}', function (String $language, String $identifier) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    $page = request()->input('page', 1);
    $tag = ArtTag::where('name', $identifier)->firstOrFail();
    return Cache::rememberForever("view.arts_$language.$tag.$identifier.$page", function () use ($language, $identifier, $tag) {
        App::setLocale($language);
        return view("pages/arts_tag", ['tag' => $tag])->render();
    });
});

Route::get('/arts_{language}/{identifier}', function (String $language, String $identifier) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }

    $art = Art::where('identifier', $identifier)->firstOrFail();

    return Cache::rememberForever("view.arts_$language.$identifier", function () use ($language, $identifier, $art) {
        App::setLocale($language);
        return view("pages/art", ['art' => $art])->render();
    });
});


Route::get('/arts_{language}', function (String $language) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }

    $page = request()->input('page', 1);
    return Cache::rememberForever("view.arts_$language.$page", function () use ($language) {
        App::setLocale($language);
        return view("pages/arts")->render();
    });
});

Route::get('/articles_{language}', function (String $language) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    $page = request()->input('page', 1);
    return Cache::rememberForever("view.articles_$language.$page", function () use ($language) {
        App::setLocale($language);
        return view("pages/articles")->render();
    });
});

Route::get('/articles_{language}/{identifier}', function (String $language, String $identifier) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    $article = Article::where([['identifier', $identifier], ['language', $language]])->firstOrFail();
    return Cache::rememberForever("view.articles_$language.$identifier", function () use ($language, $article) {
        App::setLocale($language);
        return view("articles/".$article->identifier."_".$language, ['article' => $article])->render();
    });
});

Route::get('/articles_{language}/tag/{identifier}', function (String $language, String $identifier) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    $tag = ArticleTag::where('name', $identifier)->firstOrFail();
    return Cache::rememberForever("view.arts_$language.$tag.$identifier", function () use ($language, $identifier, $tag) {
        App::setLocale($language);
        return view("pages/articles_tag", ['tag' => $tag])->render();
    });
});

Route::get('/personas_{language}/{identifier}', function (String $language, String $identifier) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    $persona = Persona::where('identifier', $identifier)->firstOrFail();
    $page = request()->input('page', 1);
    return Cache::rememberForever("view.persona_$language.$identifier.$page", function () use ($language, $identifier, $persona) {
        App::setLocale($language);
        return view("personas/".$identifier."_".$language, ['persona' => $persona])->render();
    });
});

Route::get('/artist_{language}/{identifier}', function (String $language, String $identifier) {
    if (!in_array($language, ['pt', 'en'])) {
        $language = 'en';
    }
    $artist = Artist::where('identifier', $identifier)->firstOrFail();
    $page = request()->input('page', 1);
    return Cache::rememberForever("view.artist_$language.$identifier.$page", function () use ($language, $identifier, $artist) {
        App::setLocale($language);
        return view("pages/artist", ['artist' => $artist])->render();
    });
});

