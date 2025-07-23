<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\Factories\CourseFactory;

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
}
