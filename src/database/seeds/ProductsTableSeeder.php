<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++){
            Product::Create([
                'name' => $faker->name,
                'price' => $faker->randomDigit
            ]);
        }
    }
}
