<?php

namespace Tests\Unit;

use App\Models\Post;
use Tests\TestCase;

class PostTest extends TestCase
{
    public $post;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->post = factory(Post::class)->create();
    }

    public function testFileIsImage()
    {
        $this->post->file = 'test-image-name.jpg';
        $this->assertTrue($this->post->fileIsImage);
    }

    public function testFileIsNotImage()
    {
        $this->post->file = 'test-image-name.js';
        $this->assertFalse($this->post->fileIsImage);
    }

    public function testFileIsEmpty()
    {
        $this->post->file = null;
        $this->assertFalse($this->post->fileIsImage);
    }

    public function testFileStoragePath()
    {
        $this->post->file = 'test-image-name.png';
        $this->assertEquals('/storage/' . $this->post->file, $this->post->fileStoragePath);
    }

    public function testFileName()
    {
        $this->post->file = 'uploads/test-image-name.png';
        $this->assertEquals('test-image-name.png', $this->post->fileName);
    }

    public function testCategoryIds()
    {
        $ids = $this->post->category_ids;
        $this->assertEmpty($ids);
    }
}
