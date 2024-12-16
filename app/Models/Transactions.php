<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transactions extends Model
{
    use HasFactory, HasUuids;

    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $fillable = [
        'transaction_date',
        'shipping_number',
        'status',
        'buyer_id',
        'seller_id',
        'game_id',
    ];

    public function sellers(): BelongsTo
    {
        return $this->belongsTo(Sellers::class, 'seller_id', 'id');
    }

    public function games(): HasOne
    {
        return $this->hasOne(Games::class, 'id', 'game_id');
    }
}