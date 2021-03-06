<?php

namespace Tests\Unit;

use App\Exceptions\CreatePostException;
use App\Exceptions\UpdatePostException;
use App\Exceptions\DestroyPostException;
use App\Models\Post;
use App\Services\PostService;
use Faker\Factory as Faker;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    public $faker;
    public $postService;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->faker = Faker::create();
        $this->postService = new PostService();
    }

    /**
     * @throws CreatePostException
     */
    public function testCreate()
    {
        $data = [
            'name' => $this->faker->name,
            'content' => $this->faker->text,
            'category_ids' => [1, 2, 3]
        ];

        $post = $this->postService->create($data);
        $this->assertTrue($post instanceof Post);
    }

    /**
     * @throws UpdatePostException
     */
    public function testUpdate()
    {
        $data = [
            'name' => $this->faker->name,
            'content' => $this->faker->text,
            'category_ids' => [1, 2, 3]
        ];

        $oldPost = factory(Post::class)->create();
        $post = $this->postService->update($oldPost, $data);
        $this->assertTrue($post instanceof Post);
    }

    /**
     * @throws DestroyPostException
     */
    public function testDelete()
    {
        $post = factory(Post::class)->create();
        $result = $this->postService->delete($post);
        $this->assertTrue($result);
    }
}
