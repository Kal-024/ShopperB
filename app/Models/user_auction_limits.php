<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_auction_limits extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'auction_id',
        'remaining_points',
        'last_regeneration',
    ];
}
