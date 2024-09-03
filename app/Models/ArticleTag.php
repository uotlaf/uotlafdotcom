<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name"
    ];

    public function articles(): belongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
