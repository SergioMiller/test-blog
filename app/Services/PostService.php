<?php

namespace App\Services;

use App\Exceptions\CreatePostException;
use App\Exceptions\DestroyPostException;
use App\Exceptions\UpdatePostException;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{
    /**
     * @param $data
     * @return Post
     * @throws CreatePostException
     */
    public function create($data)
    {
        $post = new Post($data);

        if (!empty($data['upload_file'])) {
            $post->file = $this->uploadFile($data['upload_file']);
        }

        if ($post->save()) {
            $post->categories()->attach($data['category_ids']);
            return $post;
        }

        throw new CreatePostException();
    }

    /**
     * @param $post
     * @param $data
     * @return mixed
     * @throws UpdatePostException
     */
    public function update(Post $post, $data)
    {
        $post->fill($data);

        if (!empty($data['upload_file'])) {
            $post->file = $this->uploadFile($data['upload_file']);
        }

        $post->categories()->sync($data['category_ids']);

        if ($post->save()) {
            return $post;
        }

        throw new UpdatePostException();
    }

    /**
     * @param Post $post
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Post $post)
    {
        if ($post->delete()) {
            return true;
        }
        throw new DestroyPostException();
    }

    /**
     * @param $file
     * @return string
     */
    protected function uploadFile($file)
    {
        return $file->store('uploads', 'public');
    }
}
