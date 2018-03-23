<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker, $user_id) {
    return [
        //
        'user_id' => $user_id,
        'title' => $faker->sentence,
        'content' => $faker->paragraph,        
    ];
});
