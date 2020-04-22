<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

/**
 * Class PostSeeder
 */
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = factory(Post::class, 50)->create()->each(function(Post $post) {
            $post->comments()->saveMany(factory(\App\Models\Comment::class, 5)->make());
        });
    }
}
