<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Photo::class, function (Faker $faker) {
    return [
        'album_id' => rand(1, 8),
        'placeholder_id' => rand(1, 12),
        'title' => rtrim($faker->sentence(rand(1, 2)), "."),
        'url' => 'https://via.placeholder.com/600/b0f7cc',
        'thumbnail' => 'https://via.placeholder.com/150/d32776',
        'favorite' => rand(0, 1)
    ];
});
