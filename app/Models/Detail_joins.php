<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_joins extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'detail_joins';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'community_id',
    ];
}
