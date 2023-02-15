<?php

namespace Database\Seeders;

use App\Helpers\GlobalHelpers;
use App\Models\Restaurant;
use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $res_arr = config('restaurant');

        foreach ($res_arr as $res) {
            $new_res = new Restaurant();

            $new_res->user_id = 1;
            $new_res->name_of_restaurant = $res['name_of_restaurant'];
            $new_res->slug = GlobalHelpers::generateSlug($new_res->name_of_restaurant, $new_res);
            $new_res->p_iva = $faker->bothify('###########');
            $new_res->website = $res['website'];
            $new_res->address = $res['address'];
            $new_res->phone_number = $res['phone_number'];
            $new_res->email = $res['email'];

            foreach ($res['foods'] as $food) {
                $new_food = new Food();

                $new_food->restaurant_id = $res['id'];
                $new_food->name = $food['name'];
                $new_food->price = $food['price'];
                $new_food->ingredients = $food['ingredients'];
                $new_food->is_available = $food['is_available'];

                $new_food->save();
            }
        }
        $new_res->save();
    }
}
