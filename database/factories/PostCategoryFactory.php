<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Category;

$factory->define(PostCategory::class, function (Faker $faker) {
    return [
        'post_id' => rand(1, Post::count()),
        'category_id' => rand(1, Category::count())
    ];
});
