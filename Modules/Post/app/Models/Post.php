<?php

namespace Modules\Post\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Post\Database\Factories\PostFactory;
use Modules\Post\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\AdminUser\Models\AdminUser;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','content','category_id','menthor_id'];
    protected $hidden = ['category_id', 'menthor_id'];

    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function menthor(): BelongsTo {
        return $this->belongsTo(AdminUser::class);
    }
}
