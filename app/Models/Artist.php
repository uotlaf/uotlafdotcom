<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
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
    static function new(string $name, string $link): bool
    {
        // Invalidates cache key
        self::cache_keys_invalidate();
        return DB::table('artists')->insert(['name' => $name, 'link' => $link]);
    }

    static function cache_keys_invalidate(): void
    {
        Cache::forget("Artists");
    }

    /**
     * Creates a bunch of new Artists based on an [[Artist], [Artist]] array
     * @param array $artist
     * @return bool
     */
    static function seed(array $artist): bool
    {
        self::cache_keys_invalidate();
        return DB::table('artists')->insert($artist);
    }
}
