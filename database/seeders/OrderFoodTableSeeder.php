<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {
            $order = Order::inRandomOrder()->first();

            $food_id = Food::inRandomOrder()->first()->id;

            $order->foods()->attach($food_id);
        }
    }
}
