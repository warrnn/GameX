<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sales extends Model
{
    use HasFactory, HasUuids;

    protected $table = "sales";
    protected $primaryKey = "id";
    protected $fillable = [
        "discount",
        "game_id"
    ];

    public function games(): BelongsTo
    {
        return $this->belongsTo(Games::class, 'id', 'game_id');
    }
}
