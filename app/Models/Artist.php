<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * @method static where(string $string, mixed $artist)
 */
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
     * Imports arts from storage/import/arts/arts.csv
     * @return void
     * @throws Exception
     */
    static public function importFromStorage(): void
    {
        // Get file from directory
        $file = Storage::disk('local')->get("import/artists/artists.csv");

        // If file dont exists, panic
        if (empty($file)) {
            throw new Exception("Art file is empty. Please copy storage/app/import/artists/example.csv to artists.csv");
        }

        // Get array from csv
        $arr = CommonFunctions::read_csv($file)->toArray();

        // Add to database
        self::seed($arr);
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
