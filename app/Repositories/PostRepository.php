<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class CategoryRepository
 * @package App\Repositories
 *
 * @property Post $model
 */
class PostRepository implements RepositoryInterface
{
    /**
     * CategoryRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function findAll()
    {
        return $this->model->all();
    }
}
