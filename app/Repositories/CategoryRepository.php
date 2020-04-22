<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class CategoryRepository
 * @package App\Repositories
 *
 * @property Category $model
 */
class CategoryRepository implements RepositoryInterface
{
    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
