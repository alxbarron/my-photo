<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Photo::class, function (Faker $faker) {
    return [
        'albumId' => rand(1, 8),
        'placeholderId' => rand(1, 12),
        'title' => rtrim($faker->sentence(rand(5, 10)), "."),
        'url' => 'https://via.placeholder.com/600/b0f7cc',
        'favorite' => rand(0, 1)
    ];
});
