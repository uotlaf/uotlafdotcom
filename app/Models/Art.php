<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Art extends Model
{
    use HasFactory;

    /**
     * Creates a new Art
     * @param String $name
     * @param string $description
     * @param int $artist_id
     * @param string $path_light
     * @param string $path_dark
     * @param bool $has_dark_mode
     * @param bool $is_banner
     * @return bool
     */
    static function new(string $name,
                        string $description,
                        int    $artist_id,
                        string $path_light,
                        string $path_dark,
                        bool   $has_dark_mode,
                        bool   $is_banner): bool
    {
        return DB::table('arts')->insert(
            ['name' => $name,
                'description' => $description,
                'artist' => $artist_id,
                'path_light' => $path_light,
                'path_dark' => $path_dark,
                'has_dark_mode' => $has_dark_mode,
                'is_banner' => $is_banner]
        );
    }

    /**
     * Creates a bunch of new artis based on an [[Art], [Art]] array
     * @param array $arts
     * @return bool
     */
    static function seed(array $arts): bool
    {
        return DB::table('arts')->insert($arts);
    }
}
