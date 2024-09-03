<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static updateOrCreate(array $array, array $array1)
 */
class Artist extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "identifier",
        "link",
    ];

    public function arts(): BelongsToMany
    {
        return $this->belongsToMany(Art::class);
    }

    public function getPhotoAttribute(): string
    {
        return env('CDN_PATH')."/asset/artist/$this->identifier/avatar";
    }

    public function getBannerAttribute(): string
    {
        return env('CDN_PATH')."/asset/artist/$this->identifier/banner";
    }
}
