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
        /* Nello stesso ordine non possono essere presenti piatti di ristoranti diversi */

        /*  for ($i = 0; $i < 30; $i++) {
            $order = Order::inRandomOrder()->first();

            $food_id = Food::inRandomOrder()->first()->id;

            $order->foods()->attach($food_id);
        } */

        $order = Order::find(1);
        $food_id = Food::find(15);
        $order->foods()->attach($food_id);

        $order = Order::find(2);
        $food_id = Food::find(16);
        $order->foods()->attach($food_id);

        /* $last_orders = [];

        for ($i = 0; $i < 10; $i++) {
            $order_id = Order::inRandomOrder()->first()->id;

            array_push($last_orders, [$i, $order_id]);
        } */
    }
}
