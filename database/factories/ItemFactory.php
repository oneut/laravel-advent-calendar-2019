<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Eloquent\Item;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Item::class, function (Faker $faker) {
    return [
        'price' => random_int(100, 10000)
    ];
});
