<?php

namespace Database\Seeders;

use App\Helpers\GlobalHelpers;
use App\Models\Restaurant;
use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use function PHPUnit\Framework\objectHasAttribute;

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
        $count = 1;
        foreach ($res_arr as $res) {
            $new_res = new Restaurant();

            $new_res->user_id = $count;
            $new_res->name_of_restaurant = $res['name_of_restaurant'];
            $new_res->slug = GlobalHelpers::generateSlug($new_res->name_of_restaurant, $new_res);
            $new_res->p_iva = $faker->bothify('###########');
            $new_res->website = $res['website'];
            $new_res->address = $res['address'];
            $new_res->phone_number = $res['phone_number'];
            $new_res->email = $res['email'];

            if(array_key_exists('cover_image', $res)){
                $new_res->cover_image = $res['cover_image'];
            }


            $new_res->save();

            foreach ($res['foods'] as $food) {
                $new_food = new Food();

                $new_food->restaurant_id = $res['id'];
                $new_food->name = $food['name'];
                $new_food->price = $food['price'];
                $new_food->ingredients = $food['ingredient'];
                $new_food->is_available = $food['is_available'];
                if(isset($food['cover_image']))
                    $new_food->cover_image = $food['cover_image'];
                $new_food->save();
            }
            $count++;
        }
    }
}
