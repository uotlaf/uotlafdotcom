<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Artist extends Model
{
    use HasFactory;


    /**
     * Creates a new Artist
     * @param String $name
     * @param String $link
     * @return bool
     */
    static function new(String $name, String $link) : bool {
        return DB::table('artists')->insert([$name, $link]);
    }

    /**
     * Creates a bunch of new Artists based on an [[Artist], [Artist]] array
     * @param array $artist
     * @return bool
     */
    static function seed(array $artist) : bool {
        return DB::table('artists')->insert($artist);
    }
}
