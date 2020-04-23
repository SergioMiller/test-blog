<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 *
 * @property PostRepository $postRepository
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    public $postRepository;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request)
    {
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
    }

    public function destroy(Post $post)
    {
    }
}
