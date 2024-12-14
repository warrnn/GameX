<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Games extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'publisher',
        'release_date',
        'base',
        'portrait_image_path',
        'landscape_image_path',
    ];

    public function game_owneds(): HasMany
    {
        return $this->hasMany(Game_owneds::class, 'game_id', 'id');
    }

    public function sales(): HasOne
    {
        return $this->hasOne(Sales::class, 'game_id', 'id');
    }

    public function communities(): HasMany
    {
        return $this->hasMany(Communities::class, 'game_id', 'id');
    }

    public function categories(): HasOne
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function sell_details(): HasMany
    {
        return $this->hasMany(Sell_details::class, 'game_id', 'id');
    }

    public function transactions(): BelongsTo
    {
        return $this->belongsTo(Transactions::class, 'game_id', 'id');
    }
}
