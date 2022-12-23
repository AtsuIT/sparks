<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => ['en'=>$faker->word(),'ar'=>$faker->word()],
        'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
        // 'manufacturer_id' => \App\Manufacturer::inRandomOrder()->first()->id,
        'description' => ['en'=>$faker->paragraph,'ar'=>$faker->paragraph],
        'price' => rand(1000, 99999),
        'code' => $faker->realText(20),

    ];
});
