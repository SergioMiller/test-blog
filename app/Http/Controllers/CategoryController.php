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
        try {
            $category = new Category($request->all());
            $category->save();
        } catch (\Exception $e) {
            session()->flash('danger', "Error saving data!");
            return back()->withInput();
        }

        session()->flash('success', "Category {$category->name} creates successfully!");
        return redirect(route('category.edit', $category->id));
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

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
        } catch (\Exception $e) {
            session()->flash('danger', "Error saving data!");
            return back()->withInput();
        }

        session()->flash('success', "Category {$category->name} updated successfully!");
        return redirect(route('category.edit', $category->id));
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            session()->flash('danger', "Error deleting data!");
            return back()->withInput();
        }

        session()->flash('success', "Category {$category->name} deleted successfully!");
        return back();
    }
}
