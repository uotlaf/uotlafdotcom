<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "title",
        "subtitle",
        "author",
        "path_banner_light",
        "path_banner_dark",
        "identifier",
        "language",
        "assets_folder",
        "hide_from_posts",
        "views"
    ];

    public function getAsset(String $asset) {
        return env('CDN_PATH')."/asset/article/$this->assets_folder/$asset";
    }

    public function getBannerAttribute() {
        if (\App\Helpers\SummerHelper::is_summer() && $this->path_banner_dark) {
            return $this->banner_dark;
        }
        return $this->banner_light;
    }

    public function getBannerLightAttribute() {
        return env('CDN_PATH')."/asset/article/$this->assets_folder/$this->path_banner_light";
    }

    public function getBannerDarkAttribute() {
        if ($this->path_banner_dark) {
            return env('CDN_PATH')."/asset/article/$this->assets_folder/$this->path_banner_dark";
        }
        return null;
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(ArticleTag::class);
    }


}
