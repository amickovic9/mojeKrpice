<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder
{
    /**
     * Seed the application's database with orders.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $created_at = $faker->dateTimeBetween('-1 month', 'now');
            $updated_at = $faker->dateTimeBetween($created_at, 'now');

            DB::table('orders')->insert([
                'user_id' => $faker->numberBetween(1, 10), // Assuming you have 10 users
                'product_id' => $faker->numberBetween(1, 20), // Assuming you have 20 products
                'address' => $faker->address,
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'phone_number' => $faker->phoneNumber,
                'accepted' => $faker->boolean,
                'delivered' => $faker->boolean,
                'note' => $faker->text,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ]);
        }
    }
}
