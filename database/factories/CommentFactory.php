<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Models\Comment;
use App\Models\Post;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'author' => $faker->name . ' ' . $faker->lastName,
        'content' => $faker->text
    ];
});
