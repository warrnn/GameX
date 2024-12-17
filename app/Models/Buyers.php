<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Buyers extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'buyers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'phone',
        'domicile',
        'user_id'
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transactions::class, 'buyer_id', 'id');
    }
    
    public function buyerable(): MorphTo
    {
        return $this->morphTo();
    }
}