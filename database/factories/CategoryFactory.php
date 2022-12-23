<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => ['en'=>$faker->word(),'ar'=>$faker->word()],
        'code' => $faker->realText(20),
        'division_code' => $faker->realText(20),
    ];
});
