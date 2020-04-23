<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    public function add(CommentRequest $request, Comment $comment): CommentResource
    {
        $comment->fill($request->all());

        if (!$comment->save()){
            throw new \ErrorException();
        }

        return new CommentResource($comment);
    }
}
