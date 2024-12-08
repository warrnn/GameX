<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communities extends Model
{
    use HasFactory, HasUuids;

    protected $table = "communities";
    protected $primaryKey = "id";
    protected $fillable = [
        "name",
        "description",
        "game_id",
        "image_path",
    ];
}
