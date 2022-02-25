<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        "article_id" => rand(1, 20),
        "user_id" => rand(1, 4),
    ];
});
