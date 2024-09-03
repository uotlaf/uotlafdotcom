<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtLink extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "art_id",
        "name",
        "link",
        "icon",
    ];

    public function arts(): BelongsToMany
    {
        return $this->BelongsToMany(Art::class);
    }
}
