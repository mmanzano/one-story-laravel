<?php

use App\Story;
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

$factory->define(App\Character::class, function (Faker $faker) {
    return [
        'story_id' => function() {
            return factory(Story::class)->create()->id;
        },
        'name' => $faker->text(100),
        'description' => $faker->paragraph(20),
    ];
});
