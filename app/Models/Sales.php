<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory, HasUuids;

    protected $table = "sales";
    protected $primaryKey = "id";
    protected $fillable = [
        "discount",
        "start_date",
        "end_date",
        "game_id"
    ];
}
