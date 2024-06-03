<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database with users.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $faker = \Faker\Factory::create();

        // Generate 10 users
        for ($i = 0; $i < 10; $i++) {
            $created_at = $faker->dateTimeBetween('-1 month', 'now');
            $users[] = [
                'username' => $faker->username,

                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,

                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // default password 'password'
                'admin' => 0,
                'created_at' => $created_at,
                'updated_at' => $created_at,
            ];
        }

        DB::table('users')->insert($users);
    }
}
