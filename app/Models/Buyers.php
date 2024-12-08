<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyers extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'buyers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'phone',
    ];
}
