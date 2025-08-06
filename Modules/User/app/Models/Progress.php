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
    protected $fillable = ['transaction_id', 'lesson_id', 'progress', 'completion_status', 'progress_timestamp'];

    protected static function newFactory(): ProgressFactory
    {
        return ProgressFactory::new();
    }
}
