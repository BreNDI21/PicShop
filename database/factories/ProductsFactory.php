<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(\App\Model\Products::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'comment' => $faker->realText(),
        'price' => rand(1,1000),
        'category_id' =>rand(1,3),
        'image' => rand(1,3)
    ];
});
