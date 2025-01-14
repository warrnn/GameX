<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game_owneds extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'game_owneds';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'game_id',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'id', 'user_id');
    }

    public function games(): BelongsTo
    {
        return $this->belongsTo(Games::class, 'id', 'game_id');
    }
}
