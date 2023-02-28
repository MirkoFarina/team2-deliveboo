<?php

namespace Database\Seeders;

use App\Helpers\GlobalHelpers;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
        [
            [
                "name"        => 'PIZZA',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/pizza'
            ],
            [
                "name"        => 'HAMBURGER',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/hamburger'
            ],
            [
                "name"        => 'PANINI',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/panini'
            ],
            [
                "name"        => 'PASTA',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/italiano'
            ],
            [
                "name"        => 'GIAPPONESE',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/sushi'
            ],
            [
                "name"        => 'HAWAIANO',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/poke'
            ],
            [
                "name"        => 'KEBAB',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/messicano'
            ],
            [
                "name"        => 'AMERICANO',
                "cover_image" => 'https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,h_480,q_auto,w_640/v1/experiments/projecticing/it/cuisine-icons/americano'
            ]
        ];

        foreach ($categories as $category) {
            $new_category              = new Category();
            $new_category->name        = $category['name'];
            $new_category->slug        = GlobalHelpers::generateSlug($new_category->name, $new_category);
            $new_category->cover_image = $category['cover_image'];
            $new_category->save();
        }
    }

}
