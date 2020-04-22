<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'author',
        'content',
    ];
}
