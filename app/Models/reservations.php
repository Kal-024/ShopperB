<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'auction_item_id',
        'status',
        'expires_at',
        'created_at',
    ];
}
