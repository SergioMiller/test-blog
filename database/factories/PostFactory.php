<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text,
        'file' => 'https://picsum.photos/200/300.webp',
    ];
});
