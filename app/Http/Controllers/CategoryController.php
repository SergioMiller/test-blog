<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\PostRepository;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 *
 * @property CategoryRepository $categoryRepository
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    public $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->findAll();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
    }

    public function show(Category $category, PostRepository $postRepository)
    {
        $posts = $postRepository->findByCategoryId($category->id);

        return view('category.show', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update()
    {
    }

    public function destroy(Category $category)
    {
        return ;
    }
}
