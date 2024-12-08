<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'value',
        'user_id',
        'community_id',
    ];
}
