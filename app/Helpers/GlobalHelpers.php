<?php

namespace App\Helpers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public static function checkRestaurant()
    {
        $is_check = Restaurant::where('user_id', Auth::id())->first();
        if($is_check) {
            return true;
        }else {
            return false;
        }
    }

}
