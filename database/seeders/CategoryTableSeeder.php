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
                "name"        => 'ITALIANO',
                "description" => 'Lorem ipsum deciv voce'
            ],
            [
                "name"        => 'CINESE',
                "description" => 'Lorem ipsum deciv voce'
            ],
            [
                "name"        => 'PIZZA',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'GIAPPONESE',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'ARGENTINO',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'KEBAB',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'HAMBURGER',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'PASTA',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'POLLO',
                "description" => 'Lorem ipsum deciv coeve'
            ],
            [
                "name"        => 'PERSIANO',
                "description" => 'Lorem ipsum deciv coeve'
            ],
        ];

        foreach ($categories as $category) {
            $new_category              = new Category();
            $new_category->name        = $category['name'];
            $new_category->slug        = GlobalHelpers::generateSlug($new_category->name, $new_category);
            $new_category->description = $category['description'];
            $new_category->save();
        }
    }

}
