<?php

namespace Rizwan3d\CommentSystem\Traits;

use Rizwan3d\CommentSystem\Models\Comment;

trait Commentable
{
    public function addComment(string $content)
    {
        $comment = new Comment();
        $comment->commentable_id = $this->id;
        $comment->commentable_type = get_class($this);
        $comment->content = $content;
        $comment->save();

        return $comment;
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->with('comments');
    }
}
