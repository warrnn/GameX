<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'content',
        'user_id',
        'community_id',
    ];

    public function communities(): BelongsTo
    {
        return $this->belongsTo(Communities::class, 'id', 'community_id');
    }
}
