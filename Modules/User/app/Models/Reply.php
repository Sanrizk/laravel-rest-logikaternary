<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\Factories\ReplyFactory;

class Reply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['content_reply', 'forum_id', 'user_reply_id', 'admin_reply_id'];

    protected static function newFactory(): ReplyFactory
    {
        return ReplyFactory::new();
    }
}
