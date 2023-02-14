<?php

namespace Database\Seeders;

use App\Helpers\GlobalHelpers;
use App\Models\Restaurant;
use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res_arr = config('restaurant');

        foreach ($res_arr as $res) {
            $new_res = new Restaurant();

            $new_res->name_of_restaurant = $res['name_of_restaurant'];
            $new_res->slug = GlobalHelpers::generateSlug($new_res->name_of_restaurant, $new_res);
            $new_res->p_iva = '10101010101';
            $new_res->website = $res['website'];
            $new_res->address = $res['address'];
            $new_res->phone_number = $res['phone_number'];
            $new_res->email = $res['email'];

            foreach ($res['foods'] as $food) {
                $new_food = new Food();

                /* !
                    1. Implementare relazioni foods-restaurants
                    2. Collegare la chiave del ristorante al food
                */

                $new_food->name = $food['name'];
                $new_food->price = $food['price'];
                /*                 $new_food->ingredients = $food['ingredients'];
                 */
                $new_food->is_available = $food['is_available'];

            }
        }

        dump($new_res);

    }
}
