<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

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

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function homeList($perPage = 15)
    {
        return $this->model->orderByDesc('id')->paginate($perPage);
    }

    /**
     * @param $id
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function findByCategoryId($id, $perPage = 15)
    {
        return$this->model->whereHas('categories', function (Builder $query) use ($id) {
            $query->where('id', $id);
        })->orderByDesc('id')->paginate($perPage);
    }
}
