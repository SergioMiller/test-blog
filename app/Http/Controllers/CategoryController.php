<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

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
}
