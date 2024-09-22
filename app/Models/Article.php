<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Article extends Model implements Feedable
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

    public function getBannerLightAttribute(): string
    {
        return env('CDN_PATH')."/asset/article/$this->assets_folder/$this->path_banner_light";
    }

    public function getBannerDarkAttribute(): ?string
    {
        if ($this->path_banner_dark) {
            return env('CDN_PATH')."/asset/article/$this->assets_folder/$this->path_banner_dark";
        }
        return null;
    }

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(ArticleTag::class);
    }

    public function tagNames(): array
    {
        return $this->tags()->pluck("name")->toArray();
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->subtitle)
            ->updated($this->updated_at)
            ->link(route('article', ['language' => App::currentLocale(), 'identifier' => $this->identifier]))
            ->authorName($this->author);
    }

    public static function getFeedItems($language)
    {
        return Article::where([['language', $language], ['hide_from_posts', false]])->orderBy('updated_at', 'desc')->get();
    }
}
