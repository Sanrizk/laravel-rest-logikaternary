<?php

namespace Modules\AdminUser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AdminUser\Database\Factories\AdminUserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Post\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // protected static function newFactory(): AdminUserFactory
    // {
    //     // return AdminUserFactory::new();
    // }

    public function posts(): HasMany {
        return $this->hasMany(Post::class, 'methor_id', 'id');
    }
}
