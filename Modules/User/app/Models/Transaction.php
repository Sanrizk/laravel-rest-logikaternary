<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\Factories\TransactionFactory;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id', 'course_id', 'amount', 'status', 'description'];
    // protected $hidden = ['user_id'];

    protected static function newFactory(): TransactionFactory
    {
        return TransactionFactory::new();
    }
}
