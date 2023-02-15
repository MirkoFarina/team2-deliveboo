<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Foundation\Auth\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $new_user = new User();
            $new_user->name = $faker->name();
            $new_user->surname = $faker->lastName();
            $new_user->address = $faker->address();
            $new_user->phone_number = $faker->bothify('#########');
            $new_user->email = $faker->email();
            $new_user->password = 'prova';

            $new_user->save();
        }
    }
}
