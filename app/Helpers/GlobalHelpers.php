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


    public static function adjustImage($class){
        if (!(substr($class->cover_image, 0, 4) == 'http') && !is_null($class->cover_image)){
            $class->cover_image = url("storage/" . $class->cover_image);
        }

        else if (is_null($class->cover_image)){
            $class->cover_image = url("https://troianiortodonzia.it/wp-content/uploads/2016/10/orionthemes-placeholder-image.png");
        }

        return $class;
    }

}
