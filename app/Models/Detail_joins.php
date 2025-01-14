<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail_joins extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'detail_joins';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'community_id',
    ];

    public function communities(): BelongsTo
    {
        return $this->belongsTo(Communities::class, 'id', 'community_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'id', 'user_id');
    }
}
