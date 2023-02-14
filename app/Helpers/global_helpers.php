<?php

namespace App\Helpers;
use Illuminate\Support\Str;
use App\Models;

class GlobalHelpers
{
    public static function generateSlug($title, $class) {
        $slug = Str::slug($title,'-');
        $original_slug = $slug;
        $c = 1;

        $slug_exists = $class::where('slug', $slug)->first();

        while($slug_exists) {
            $slug = $original_slug . '-' . $c;
            $slug_exists = $class::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }
}
