<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtTag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function arts(): BelongsToMany
    {
        return $this->belongsToMany(Art::class);
    }

}
