<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Admins extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
    ];

    public function adminable(): MorphTo
    {
        return $this->morphTo();
    }
}
