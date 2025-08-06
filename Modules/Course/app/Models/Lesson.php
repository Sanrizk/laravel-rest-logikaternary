<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\AdminUser\Models\AdminUser;
use Modules\Course\Database\Factories\LessonFactory;
use Modules\Course\Models\Course;
use Modules\Course\Models\Topic;

class Lesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'description', 'price', 'course_id', 'menthor_id'];
    protected $hidden = ['course_id', 'menthor_id'];

    protected static function newFactory(): LessonFactory
    {
        return LessonFactory::new();
    }

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function menthor(): BelongsTo {
        return $this->belongsTo(AdminUser::class);
    }

    public function topics(): HasMany {
        return $this->hasMany(Topic::class, 'lesson_id');
    }
}
