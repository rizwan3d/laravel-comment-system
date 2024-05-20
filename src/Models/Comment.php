<?php

namespace Rizwan3d\CommentSystem\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rizwan3d\CommentSystem\Traits\Commentable;

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

    public function comments()
    {
        return $this->hasMany(Comment::class, 'commentable_id')->where(['commentable_type' => get_class($this)]);
    }
}
