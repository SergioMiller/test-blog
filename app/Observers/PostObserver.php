<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostObserver
 * @package App\Observers
 */
class PostObserver
{
    /**
     * @param Post $post
     */
    public function deleted(Post $post)
    {
        Storage::disk('public')->delete($post->file);
    }
}
