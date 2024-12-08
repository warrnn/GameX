<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sell_details extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'sell_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'seller_id',
        'game_id',
    ];

    public function sellers(): BelongsTo
    {
        return $this->belongsTo(Sellers::class, 'id', 'seller_id');
    }

    public function games(): BelongsTo
    {
        return $this->belongsTo(Games::class, 'id', 'game_id');
    }
}
