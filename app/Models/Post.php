<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 *
 * @property string $file
 */
class Post extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function getFileIsImageAttribute()
    {
        if (empty($this->file)) {
            return false;
        }
        $explode = explode('.', $this->file);
        $type = end($explode);

        return in_array($type, ['jpeg', 'jpg', 'png', 'svg', 'webp']);
    }

    public function getFileNameAttribute()
    {
        if (empty($this->file)) {
            return false;
        }

        return str_replace('/uploads/', '', $this->file);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d.m.Y H:i:s', strtotime($value));
    }
}
