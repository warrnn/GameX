<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Sellers extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'sellers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'domicile',
        'address',
        'phone',
        'user_id',
        'status'
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transactions::class, 'seller_id', 'id');
    }

    public function sell_details(): HasMany
    {
        return $this->hasMany(Sell_details::class, 'seller_id', 'id');
    }

    public function sellerable(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id', 'id');
    }
}
