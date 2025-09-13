<?php

namespace Modules\AdminUser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\AdminUser\Database\Factories\AdminUserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Course\Models\Lesson;
use Modules\Post\Models\Post;

class AdminUser extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'admin_role'
    ];

    protected static function newFactory(): AdminUserFactory
    {
        return AdminUserFactory::new();
    }

    public function lessons(): HasMany {
        return $this->hasMany(Lesson::class, 'menthor_id');
    }
    public function posts(): HasMany {
        return $this->hasMany(Post::class, 'methor_id', 'id');
    }
}
