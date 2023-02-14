<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $res_arr = config('restaurant');

        foreach($res_arr as $res){

            foreach($res['foods'] as $food){
                $new_food = new Food();

                $new_food->name = $food['name'];
                $new_food->price = $food['price'];
/*                 $new_food->ingredients = $food['ingredients'];
 */                $new_food->is_available = $food['is_available'];

            }

            dump($new_food);
        }
    }
}
