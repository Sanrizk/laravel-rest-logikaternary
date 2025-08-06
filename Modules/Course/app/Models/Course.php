<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Course\Database\Factories\CourseFactory;
use Modules\Course\Models\Lesson;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['id', 'title', 'description', 'price'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $guarded = [''];

    protected static function newFactory(): CourseFactory
    {
        return CourseFactory::new();
    }

    public function lessons(): HasMany {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
