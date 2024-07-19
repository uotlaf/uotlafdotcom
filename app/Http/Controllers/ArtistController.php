<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Get all artists
     * @return Collection
     */
    public function all(): Collection
    {
        return Artist::all();
    }
}
