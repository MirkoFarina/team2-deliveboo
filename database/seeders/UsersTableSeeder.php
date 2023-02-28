<?php

namespace Database\Seeders;

use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 11; $i++) {
            User::create([
                'name'          => $faker->name(),
                'surname'       => $faker->lastName(),
                'address'       => $faker->address(),
                'phone_number'  => $faker->bothify('#########'),
                'email'         => $faker->email(),
                'password'      => bcrypt('prova'),
            ]);
        }
    }
}
