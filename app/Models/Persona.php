<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'identifier',
        'species',
        'age',
        'height',
        'weight',
        'gender',
        'show_in_banner',
        'furry'
    ];

    public function getPhotoAttribute(): string
    {
        return env('CDN_PATH') . "/asset/persona/$this->name/avatar";
    }

    public function getBannerAttribute(): string
    {
        return env('CDN_PATH') . "/asset/persona/$this->name/banner";
    }

    public function arts(): BelongsToMany
    {
        return $this->belongsToMany(Art::class);
    }
}
