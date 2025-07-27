<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Course\Database\Factories\ContentFactory;

class Content extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['topic_id', 'title', 'content'];
    protected $hidden = ['topic_id'];

    protected static function newFactory(): ContentFactory
    {
        return ContentFactory::new();
    }

    public function topic(): BelongsTo {
        return $this->belongsTo(Topic::class);
    }
}
