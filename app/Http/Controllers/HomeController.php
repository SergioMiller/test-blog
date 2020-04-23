<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 *
 * @property CategoryRepository $categoryRepository
 * @property PostRepository $postRepository
 */
class HomeController extends Controller
{
    /**
     * @var CategoryRepository
     */
    public $categoryRepository;

    /**
     * @var PostRepository
     */
    public $postRepository;

    /**
     * HomeController constructor.
     * @param CategoryRepository $categoryRepository
     * @param PostRepository $postRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        PostRepository $postRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->findAll();
        $posts = $this->postRepository->homeList(10);

        return view('home.index', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }
}
