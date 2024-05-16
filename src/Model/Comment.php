<?php

namespace Package\CommentSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Package\CommentSystem\Traits\Commentable;

class Comment extends Model
{
    use HasFactory,Commentable;

    protected $fillable = ['commentable_id', 'commentable_type', 'content', 'parent_id'];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function scopeWithReplies($query)
    {
        return $query->with('replies.replies'); // Recursive for N levels
    }
}
