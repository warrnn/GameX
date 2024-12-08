<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Users extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
    ];

    public function game_owneds(): HasMany
    {
        return $this->hasMany(Game_owneds::class, 'user_id', 'id');
    }

    public function detail_joins(): HasMany
    {
        return $this->hasMany(Detail_joins::class, 'user_id', 'id');
    }

    public function buyer(): MorphOne
    {
        return $this->morphOne(Buyers::class, 'buyerable');
    }

    public function seller(): MorphOne
    {
        return $this->morphOne(Sellers::class, 'sellerable');
    }

    public function admin(): MorphOne
    {
        return $this->morphOne(Admins::class, 'adminable');
    }
}
