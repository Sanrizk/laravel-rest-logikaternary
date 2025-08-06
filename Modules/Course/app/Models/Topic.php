<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Course\Database\Factories\TopicFactory;
use Modules\Course\Models\Lesson;
use Modules\Course\Models\Content;

class Topic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['topic_name', 'lesson_id'];
    protected $hidden = ['lesson_id'];

    protected static function newFactory(): TopicFactory
    {
        return TopicFactory::new();
    }

    public function lesson(): BelongsTo {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function contents(): HasMany {
        return $this->hasMany(Content::class, 'topic_id');
    }
}
