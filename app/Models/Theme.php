<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    static public function get(String $asset): string
    {
        return env('CDN_PATH')."/asset/theme/".Config('site.current_theme')."/$asset";
    }
}
