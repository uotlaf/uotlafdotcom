<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArtistController::class, 'all']);
