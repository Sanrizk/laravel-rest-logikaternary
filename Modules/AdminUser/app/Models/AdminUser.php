<?php

namespace Modules\AdminUser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\AdminUser\Database\Factories\AdminUserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    // protected static function newFactory(): AdminUserFactory
    // {
    //     // return AdminUserFactory::new();
    // }
}
