<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Spatie\Feed\FeedItem;

class Art extends Model
{
    use SoftDeletes;

    protected $table = "arts";

    protected $fillable = [
        'identifier',
        'name',
        'description',
        'artist',
        'path_light',
        'path_dark',
        'is_banner',
        'path_card_light',
        'path_card_dark',
        'suggestive',
        'created_at'
    ];

    // Images
    public function getPhotoAttribute()
    {
        if (\App\Helpers\SummerHelper::is_summer() && $this->path_dark) {
            return $this->dark_photo;
        }
        return $this->light_photo;
    }

    public function getLightPhotoAttribute() {
        return env('CDN_PATH')."/asset/art/$this->identifier/$this->path_light";
    }

    public function getDarkPhotoAttribute() {
        if ($this->path_dark) {
            return env('CDN_PATH')."/asset/art/$this->identifier/$this->path_dark";
        }
        return null;
    }

    public function getCardAttribute() {
        if (\App\Helpers\SummerHelper::is_summer() && $this->path_card_dark) {
            return $this->card_dark;
        }
        return $this->card_light;
    }

    public function getCardLightAttribute() {
        return env('CDN_PATH')."/asset/art/$this->identifier/$this->path_card_light";
    }

    public function getCardDarkAttribute() {
        if ($this->path_card_dark) {
            return env('CDN_PATH')."/asset/art/$this->identifier/$this->path_card_dark";
        }
        return null;
    }

    static public function randomBanner(): ?string
    {
        $banners = self::where("is_banner", true)->get();
        if ($banners->count()) {
            return $banners[rand(0, $banners->count() - 1)]->card;
        }
        return null;
    }

    static public function last(int $count)
    {
        return self::where('suggestive', false)->orderBy("created_at", "desc")->take($count)->get();
    }

    public static function getFeedItems(): Collection
    {
        return self::all();
    }

    // Relationships
    public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(ArtTag::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(ArtLink::class);
    }

    // RSS

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->identifier)
            ->title($this->name)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->link(Config::get('site_url') . "/arts/" . $this->identifier)
            ->authorName(implode(',', $this->artists()->pluck("name")->toArray()));
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }

}
