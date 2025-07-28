<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\Factories\ProgressFactory;

class Progress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'content_id', 'lesson_id', 'completion_status', 'progress_timestamp'];

    protected static function newFactory(): ProgressFactory
    {
        return ProgressFactory::new();
    }
}
