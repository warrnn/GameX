<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'potrait_image_path',
        'landscape_image_path',
    ];
}
