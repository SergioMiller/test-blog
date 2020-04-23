<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 *
 * @property PostRepository $postRepository
 * @property CategoryRepository $categoryRepository
 * @property PostService $postService
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    public $postRepository;

    /**
     * @var CategoryRepository
     */
    public $categoryRepository;

    /**
     * @var PostService
     */
    public $postService;

    /**
     * PostController constructor.
     * @param PostRepository $postRepository
     * @param CategoryRepository $categoryRepository
     * @param PostService $postService
     */
    public function __construct(
        PostRepository $postRepository,
        CategoryRepository $categoryRepository,
        PostService $postService
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->postService = $postService;
    }

    public function create()
    {
        $categories = $this->categoryRepository->findAll();

        return view('post.create', [
            'categories' => $categories
        ]);
    }

    public function store(PostRequest $request)
    {
        try {
            $post = $this->postService->create($request->all());
        } catch (\Exception $e) {
            dd($e);
            session()->flash('danger', 'Error deleting data!');
            return back()->withInput();
        }

        session()->flash('success', "Post {$post->name} creates successfully!");
        return redirect(route('post.edit', $post->id));
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        $categories = $this->categoryRepository->findAll();

        return view('post.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        try {
            $post = $this->postService->update($post, $request->all());
        } catch (\Exception $e) {
            session()->flash('danger', 'Error deleting data!');
            return back()->withInput();
        }

        session()->flash('success', "Post {$post->name} updated successfully!");
        return redirect(route('post.edit', $post->id));
    }

    public function destroy(Post $post)
    {
        try {
            $this->postService->delete($post);
            session()->flash('success', "Post {$post->name} deleted successfully!");
        } catch (\Exception $e) {
            session()->flash('danger', 'Error deleting data!');
        }

        return back();
    }
}
