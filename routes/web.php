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

Route::group(['prefix' => '{language}'], function ($language) {
    Route::get('/', function ($language) {
        if (!in_array($language, ['pt', 'en'])) {
            $language = 'en';
        }
        return Cache::rememberForever("view.$language.home", function () use ($language) {
            App::setLocale($language);
            return view("articles/home_$language", ['article' => Article::where([['identifier', "home"], ['language', $language]])->first()])->render();
        });
    })->name('home');
    Route::group(['prefix' => "/articles"], function() use ($language) {
        Route::get('/', function($language) {
            if (!in_array($language, ['pt', 'en'])) {
                $language = 'en';
            }
            $page = request()->input('page', 1);
            return Cache::rememberForever("view.articles_$language.$page", function () use ($language) {
                App::setLocale($language);
                return view("pages/articles")->render();
            });
        })->name('all_articles');
        Route::get('/tag/{identifier}', function ($language, $identifier) {
            if (!in_array($language, ['pt', 'en'])) {
                $language = 'en';
            }
            $tag = ArticleTag::where('name', $identifier)->firstOrFail();
            return Cache::rememberForever("view.arts_$language.$tag.$identifier", function () use ($language, $identifier, $tag) {
                App::setLocale($language);
                return view("pages/articles_tag", ['tag' => $tag])->render();
            });
        })->name('articles_by_tag');
        Route::get('{identifier}', function ($language, $identifier) {
            if (!in_array($language, ['pt', 'en'])) {
                $language = 'en';
            }
            $article = Article::where([['identifier', $identifier], ['language', $language]])->firstOrFail();
            return Cache::rememberForever("view.articles_$language.$identifier", function () use ($language, $article) {
                App::setLocale($language);
                return view("articles/".$article->identifier."_".$language, ['article' => $article])->render();
            });
        })->name('article');
    });
    Route::group(['prefix' => "/arts"], function () use ($language) {
        Route::get('/', function ($language) {
            if (!in_array($language, ['pt', 'en'])) {
                $language = 'en';
            }
            $page = request()->input('page', 1);
            return Cache::rememberForever("view.$language.arts.$page", function () use ($language) {
                App::setLocale($language);
                return view("pages/arts")->render();
            });
        })->name('all_arts');
        Route::get('/tag/{identifier}', function ($language, $identifier) {
            if (!in_array($language, ['pt', 'en'])) {
                $language = 'en';
            }
            $page = request()->input('page', 1);
            $tag = ArtTag::where('name', $identifier)->firstOrFail();
            return Cache::rememberForever("view.arts_$language.$tag.$identifier.$page", function () use ($language, $identifier, $tag) {
                App::setLocale($language);
                return view("pages/arts_tag", ['tag' => $tag])->render();
            });
        })->name('arts_by_tag');
        Route::get('{identifier}', function ($language, $identifier) {
            if (!in_array($language, ['pt', 'en'])) {
                $language = 'en';
            }

            $art = Art::where('identifier', $identifier)->firstOrFail();

            return Cache::rememberForever("view.arts_$language.$identifier", function () use ($language, $identifier, $art) {
                App::setLocale($language);
                return view("pages/art", ['art' => $art])->render();
            });
        })->name('art');
    });
    Route::get('/artist/{identifier}', function (String $language, String $identifier) {
        if (!in_array($language, ['pt', 'en'])) {
            $language = 'en';
        }
        $artist = Artist::where('identifier', $identifier)->firstOrFail();
        $page = request()->input('page', 1);
        return Cache::rememberForever("view.artist_$language.$identifier.$page", function () use ($language, $identifier, $artist) {
            App::setLocale($language);
            return view("pages/artist", ['artist' => $artist])->render();
        });
    })->name('artist');
    Route::get('/personas/{identifier}', function (String $language, String $identifier) {
        if (!in_array($language, ['pt', 'en'])) {
            $language = 'en';
        }
        $persona = Persona::where('identifier', $identifier)->firstOrFail();
        $page = request()->input('page', 1);
        return Cache::rememberForever("view.persona_$language.$identifier.$page", function () use ($language, $identifier, $persona) {
            App::setLocale($language);
            return view("personas/".$identifier."_".$language, ['persona' => $persona])->render();
        });
    })->name('persona');
    Route::get('/about', function ($language) {
        if (!in_array($language, ['pt', 'en'])) {
            $language = 'en';
        }
        return Cache::rememberForever("view.$language.about", function () use ($language) {
            App::setLocale($language);
            return view("articles/about_$language", ['article' => Article::where([['identifier', "about"], ['language', $language]])->firstOrFail()])->render();
        });
    })->name('about');
});

Route::get('/', function () {
    return redirect('/'.App::currentLocale());
});

// In routes/web.php
Route::feeds();
