<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
{
    const UPDATED_AT = null;

    /**
     * @var string[]
     */
    protected $fillable = [
        'post_id',
        'author',
        'content',
    ];

    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
