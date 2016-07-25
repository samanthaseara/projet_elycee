<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'role' => rand(1, 3),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        // 'user_id'       => rand(1, 4),
        'title'         => $faker->title,
        'abstract'       => $faker->paragraph(2),
        'content'       => $faker->paragraph(5),
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'title'         => $faker->title,
        'content'       => $faker->paragraph(2),
        'status'       => rand(1, 2),
    ];
});
