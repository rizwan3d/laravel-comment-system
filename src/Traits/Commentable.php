<?php

namespace Package\CommentSystem\Traits;

use Package\CommentSystem\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function addComment(string $content, $parentId = null)
    {
        $comment = new Comment;
        $comment->commentable_id = $this->id;
        $comment->commentable_type = get_class($this);
        $comment->content = $content;
        $comment->parent_id = $parentId;
        $comment->save();

        return $comment;
    }
}
