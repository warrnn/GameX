<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'sellers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'phone',
        'user_id',
    ];
}
