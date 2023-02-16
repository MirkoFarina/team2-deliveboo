<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20 ; $i++) {
            $new_order = new Order();
            $new_order->name            = $faker->name();
            $new_order->surname         = $faker->lastname();
            $new_order->email           = $faker->email();
            $new_order->total_amount    = 20;
            $new_order->checked         = 1;
            $new_order->save();
        }
    }
}
