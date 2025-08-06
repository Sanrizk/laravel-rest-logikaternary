<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\Factories\ForumFactory;

class Forum extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'content', 'user_forum_id', 'admin_forum_id'];

    protected static function newFactory(): ForumFactory
    {
        return ForumFactory::new();
    }
}
