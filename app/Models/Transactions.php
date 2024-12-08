<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
