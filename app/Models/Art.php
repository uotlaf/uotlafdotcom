<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

/**
 * @method static where(string $string, true $true)
 * @method static order_by(string $string, string $string1)
 */
class Art extends Model
{
    use HasFactory;

    protected $table = 'arts';

    /**
     * Creates a new Art
     * @param String $name
     * @param string $description
     * @param int $artist_id
     * @param string $path_light
     * @param string $path_dark
     * @param bool $has_dark_mode
     * @param bool $is_banner
     * @param DateTime $created_at
     * @return bool
     */
    static function new(string $name,
                        string $description,
                        int    $artist_id,
                        string $path_light,
                        string $path_dark,
                        bool   $has_dark_mode,
                        bool   $is_banner,
                        DateTime $created_at): bool
    {
        self::cache_keys_invalidate();
        return DB::table('arts')->insert(
            ['name' => $name,
                'description' => $description,
                'artist' => $artist_id,
                'path_light' => $path_light,
                'path_dark' => $path_dark,
                'has_dark_mode' => $has_dark_mode,
                'is_banner' => $is_banner,
                'created_at' => $created_at]
        );
    }

    static function cache_keys_invalidate(): void
    {
        Cache::forget("Banners");
    }

    /**
     * Creates a bunch of new artis based on an [[Art], [Art]] array
     * @param array $arts
     * @return bool
     */
    static function seed(array $arts): bool
    {
        self::cache_keys_invalidate();
        return DB::table('arts')->insert($arts);
    }

    /**
     * From all arts with tag "banner", returns one random
     * @return Art
     */
    static public function getRandomBanner(): Art
    {
        return self::getBanners()[rand(1, Art::getBanners()->count())];
    }

    /**
     * Get all arts with tag "Banner"
     * @return Collection
     */
    static public function getBanners(): Collection
    {
        return Cache::rememberForever("Banners", function () {
            return Art::where("is_banner", true)->get();
        });
    }

    static public function getLast(int $count) {
        return Cache::rememberForever("Arts.last.$count", function () use ($count) {
                return Art::order_by("created_at", "desc")->take($count)->get();
        });
    }
}
