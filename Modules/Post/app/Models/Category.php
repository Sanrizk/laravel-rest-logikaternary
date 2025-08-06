<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Post\Database\Factories\CategoryFactory;
use Modules\Post\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['category'];

    protected static function newFactory(): CategoryFactory
    {
        return CategoryFactory::new();
    }

    public function posts(): HasMany {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
