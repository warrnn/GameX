<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Communities extends Model
{
    use HasFactory, HasUuids;

    protected $table = "communities";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "name",
        "related_game",
        "image_path",
    ];

    public function detail_joins(): HasMany
    {
        return $this->hasMany(Detail_joins::class, 'community_id', 'id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class, 'community_id', 'id');
    }
}
