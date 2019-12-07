<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Eloquent\Hamburger;
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

$factory->define(Hamburger::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'calorie' => random_int(1, 100),
    ];
});
