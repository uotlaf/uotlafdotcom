<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ArtController extends Controller
{
    /**
     * Get all arts
     * @return Collection
     */
    public function all(): Collection
    {
        return Cache::rememberForever("Arts", function () {
            return Art::all();
        });
    }
}
